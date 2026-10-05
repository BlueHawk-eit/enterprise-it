<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Minimal Postmark email sender using Postmark's HTTP API.
 *
 * Deliberately dependency-free: it calls the Postmark REST endpoint with the
 * Laravel HTTP client (Guzzle, already present) rather than pulling in the
 * symfony/postmark-mailer Composer package. If POSTMARK_API_KEY is not set,
 * sending is skipped and the caller continues — lead capture must never fail
 * just because email delivery is unconfigured.
 */
class PostmarkMailer
{
    /**
     * Send one email. Returns true on a 2xx from Postmark, false otherwise.
     *
     * @param  array<string,string>  $opts  optional: reply_to
     */
    public static function send(string $to, string $subject, string $htmlBody, string $textBody = '', array $opts = []): bool
    {
        $token = config('services.postmark.key');
        if (empty($token)) {
            Log::warning('Postmark not configured (POSTMARK_API_KEY missing); email skipped.');
            return false;
        }

        $fromName = config('services.postmark.from_name', 'enterprise IT');
        $fromAddr = config('services.postmark.from', 'support@enterpriseit.com.au');

        $payload = [
            'From' => "{$fromName} <{$fromAddr}>",
            'To' => $to,
            'Subject' => $subject,
            'HtmlBody' => $htmlBody,
            'MessageStream' => config('services.postmark.message_stream', 'outbound'),
        ];
        if ($textBody !== '') {
            $payload['TextBody'] = $textBody;
        }
        if (!empty($opts['reply_to'])) {
            $payload['ReplyTo'] = $opts['reply_to'];
        }

        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'X-Postmark-Server-Token' => $token,
                ])
                ->post('https://api.postmarkapp.com/email', $payload);

            if ($response->successful()) {
                return true;
            }

            Log::error('Postmark send failed', [
                'to' => $to,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return false;
        } catch (\Throwable $e) {
            Log::error('Postmark send exception: ' . $e->getMessage(), ['to' => $to]);
            return false;
        }
    }
}
