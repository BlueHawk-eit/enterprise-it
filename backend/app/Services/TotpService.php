<?php

namespace App\Services;

/**
 * RFC 6238 (TOTP) / RFC 4226 (HOTP) implementation with no external
 * dependencies — mirrors the self-contained approach used in OidcTokenVerifier.
 *
 * Compatible with Microsoft Authenticator, Google Authenticator, 1Password,
 * Authy, etc. (SHA1, 6 digits, 30-second period — the universal defaults).
 */
class TotpService
{
    private const PERIOD = 30;
    private const DIGITS = 6;
    private const ALGO = 'sha1';
    private const B32 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

    /**
     * Generate a new base32-encoded shared secret (default 20 bytes / 160 bits).
     */
    public static function generateSecret(int $bytes = 20): string
    {
        return self::base32Encode(random_bytes($bytes));
    }

    /**
     * Build the otpauth:// provisioning URI that authenticator apps scan.
     */
    public static function otpauthUri(string $secret, string $account, string $issuer): string
    {
        $label = rawurlencode($issuer) . ':' . rawurlencode($account);
        $params = http_build_query([
            'secret' => $secret,
            'issuer' => $issuer,
            'algorithm' => 'SHA1',
            'digits' => self::DIGITS,
            'period' => self::PERIOD,
        ]);
        return "otpauth://totp/{$label}?{$params}";
    }

    /**
     * Verify a submitted 6-digit code against the secret, allowing a ±1 step
     * window (±30s) to tolerate clock drift between server and phone.
     */
    public static function verify(?string $secret, string $code, int $window = 1): bool
    {
        $code = preg_replace('/\D/', '', $code);
        if (empty($secret) || strlen($code) !== self::DIGITS) {
            return false;
        }
        $key = self::base32Decode($secret);
        if ($key === '') {
            return false;
        }
        $counter = (int) floor(time() / self::PERIOD);
        for ($i = -$window; $i <= $window; $i++) {
            if (hash_equals(self::hotp($key, $counter + $i), $code)) {
                return true;
            }
        }
        return false;
    }

    private static function hotp(string $key, int $counter): string
    {
        $binCounter = pack('J', $counter); // 64-bit big-endian
        $hash = hash_hmac(self::ALGO, $binCounter, $key, true);
        $offset = ord($hash[strlen($hash) - 1]) & 0x0f;
        $truncated = (
            ((ord($hash[$offset]) & 0x7f) << 24) |
            ((ord($hash[$offset + 1]) & 0xff) << 16) |
            ((ord($hash[$offset + 2]) & 0xff) << 8) |
            (ord($hash[$offset + 3]) & 0xff)
        );
        $otp = $truncated % (10 ** self::DIGITS);
        return str_pad((string) $otp, self::DIGITS, '0', STR_PAD_LEFT);
    }

    private static function base32Encode(string $data): string
    {
        $out = '';
        $bits = 0;
        $value = 0;
        foreach (str_split($data) as $ch) {
            $value = ($value << 8) | ord($ch);
            $bits += 8;
            while ($bits >= 5) {
                $bits -= 5;
                $out .= self::B32[($value >> $bits) & 0x1f];
            }
        }
        if ($bits > 0) {
            $out .= self::B32[($value << (5 - $bits)) & 0x1f];
        }
        return $out;
    }

    private static function base32Decode(string $b32): string
    {
        $b32 = strtoupper(preg_replace('/[^A-Z2-7]/', '', $b32));
        if ($b32 === '') {
            return '';
        }
        $out = '';
        $bits = 0;
        $value = 0;
        foreach (str_split($b32) as $ch) {
            $idx = strpos(self::B32, $ch);
            if ($idx === false) {
                continue;
            }
            $value = ($value << 5) | $idx;
            $bits += 5;
            if ($bits >= 8) {
                $bits -= 8;
                $out .= chr(($value >> $bits) & 0xff);
            }
        }
        return $out;
    }

    /**
     * Generate a set of one-time recovery codes (plaintext — hash before storing).
     *
     * @return string[]
     */
    public static function generateRecoveryCodes(int $count = 8): array
    {
        $codes = [];
        for ($i = 0; $i < $count; $i++) {
            $raw = strtoupper(bin2hex(random_bytes(5))); // 10 hex chars
            $codes[] = substr($raw, 0, 5) . '-' . substr($raw, 5, 5);
        }
        return $codes;
    }
}
