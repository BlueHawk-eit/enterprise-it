<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Verifies Microsoft Entra ID (Azure AD) OIDC ID tokens.
 *
 * This performs real RS256 signature verification against Microsoft's published
 * JSON Web Key Set (JWKS), plus standard claim checks (issuer, audience, expiry).
 * It intentionally has no fallback/bypass path: if the tenant/client are not
 * configured, or verification fails for any reason, it returns null and the
 * caller must refuse the login. A broken-but-secure auth flow is safer than an
 * insecure one that silently accepts unsigned tokens.
 */
class OidcTokenVerifier
{
    /**
     * Verify an Entra ID ID token and return its decoded claims, or null if invalid.
     *
     * @return array<string, mixed>|null
     */
    public static function verify(string $idToken): ?array
    {
        $tenantId = config('services.azure.tenant_id');
        $clientId = config('services.azure.client_id');

        if (empty($tenantId) || empty($clientId)) {
            Log::warning('OIDC verification skipped: AZURE_TENANT_ID / AZURE_CLIENT_ID not configured.');
            return null;
        }

        $parts = explode('.', $idToken);
        if (count($parts) !== 3) {
            return null;
        }

        [$headerB64, $payloadB64, $signatureB64] = $parts;

        $header = json_decode(self::base64UrlDecode($headerB64), true);
        $payload = json_decode(self::base64UrlDecode($payloadB64), true);
        $signature = self::base64UrlDecode($signatureB64);

        if (!is_array($header) || !is_array($payload)) {
            return null;
        }

        if (($header['alg'] ?? null) !== 'RS256' || empty($header['kid'])) {
            return null;
        }

        $jwk = self::findSigningKey($tenantId, $header['kid']);
        if (!$jwk) {
            return null;
        }

        $publicKeyPem = self::jwkToPem($jwk);
        if (!$publicKeyPem) {
            return null;
        }

        $signedInput = $headerB64 . '.' . $payloadB64;
        $verified = openssl_verify($signedInput, $signature, $publicKeyPem, OPENSSL_ALGO_SHA256);

        if ($verified !== 1) {
            return null;
        }

        // Standard claim checks.
        $now = time();

        if (!isset($payload['exp']) || $now >= (int) $payload['exp']) {
            return null;
        }

        if (isset($payload['nbf']) && $now < (int) $payload['nbf']) {
            return null;
        }

        $expectedIssuers = [
            "https://login.microsoftonline.com/{$tenantId}/v2.0",
            "https://sts.windows.net/{$tenantId}/",
        ];
        if (!isset($payload['iss']) || !in_array($payload['iss'], $expectedIssuers, true)) {
            return null;
        }

        $aud = $payload['aud'] ?? null;
        if ($aud !== $clientId) {
            return null;
        }

        return $payload;
    }

    /**
     * @param  array<string, mixed>  $jwk
     */
    private static function jwkToPem(array $jwk): ?string
    {
        if (($jwk['kty'] ?? null) !== 'RSA' || empty($jwk['n']) || empty($jwk['e'])) {
            return null;
        }

        $modulus = self::base64UrlDecode($jwk['n']);
        $exponent = self::base64UrlDecode($jwk['e']);

        $modulusHex = '02' . self::derLength(strlen($modulus) + (ord($modulus[0]) > 0x7f ? 1 : 0))
            . (ord($modulus[0]) > 0x7f ? '00' : '') . bin2hex($modulus);
        $exponentHex = '02' . self::derLength(strlen($exponent)) . bin2hex($exponent);

        $sequenceHex = $modulusHex . $exponentHex;
        $sequence = '30' . self::derLength(strlen($sequenceHex) / 2) . $sequenceHex;

        $rsaOid = '300d06092a864886f70d0101010500';
        $bitString = '03' . self::derLength(strlen($sequence) / 2 + 1) . '00' . $sequence;
        $spki = '30' . self::derLength(strlen($rsaOid . $bitString) / 2) . $rsaOid . $bitString;

        $der = hex2bin($spki);
        if ($der === false) {
            return null;
        }

        $pem = "-----BEGIN PUBLIC KEY-----\n"
            . chunk_split(base64_encode($der), 64, "\n")
            . "-----END PUBLIC KEY-----\n";

        return $pem;
    }

    private static function derLength(int $length): string
    {
        if ($length < 0x80) {
            return sprintf('%02x', $length);
        }
        $hex = ltrim(dechex($length), '0') ?: '0';
        if (strlen($hex) % 2 !== 0) {
            $hex = '0' . $hex;
        }
        return sprintf('%02x', 0x80 | (strlen($hex) / 2)) . $hex;
    }

    /**
     * @return array<string, mixed>|null
     */
    private static function findSigningKey(string $tenantId, string $kid): ?array
    {
        $jwks = Cache::remember("oidc_jwks_{$tenantId}", now()->addHours(6), function () use ($tenantId) {
            $response = Http::timeout(5)->get("https://login.microsoftonline.com/{$tenantId}/discovery/v2.0/keys");
            if (!$response->successful()) {
                return null;
            }
            return $response->json('keys') ?? [];
        });

        if (!is_array($jwks)) {
            return null;
        }

        foreach ($jwks as $key) {
            if (($key['kid'] ?? null) === $kid) {
                return $key;
            }
        }

        return null;
    }

    private static function base64UrlDecode(string $data): string
    {
        $padded = strtr($data, '-_', '+/');
        $padLength = 4 - (strlen($padded) % 4);
        if ($padLength < 4) {
            $padded .= str_repeat('=', $padLength);
        }
        return base64_decode($padded) ?: '';
    }
}
