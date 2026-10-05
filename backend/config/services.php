<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        // Postmark Server API Token. Lead emails are sent via Postmark's HTTP API
        // (no extra Composer package needed). If unset, email sending is skipped
        // gracefully and the lead is still saved to the database.
        'key' => env('POSTMARK_API_KEY'),
        // Verified sender on the domain (support@enterpriseit.com.au) and where
        // internal lead notifications are delivered.
        'from' => env('MAIL_FROM_ADDRESS', 'support@enterpriseit.com.au'),
        'from_name' => env('MAIL_FROM_NAME', 'enterprise IT'),
        'notify_to' => env('LEADS_NOTIFY_TO', 'support@enterpriseit.com.au'),
        'message_stream' => env('POSTMARK_MESSAGE_STREAM', 'outbound'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'azure' => [
        // Microsoft Entra ID (Azure AD) app registration, used to verify OIDC
        // ID tokens on /api/auth/login. Client-portal login is refused until
        // both of these are set - see App\Services\OidcTokenVerifier.
        'tenant_id' => env('AZURE_TENANT_ID'),
        'client_id' => env('AZURE_CLIENT_ID'),
    ],

];
