<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services Configuration
    |--------------------------------------------------------------------------
    | Clés API et paramètres pour les intégrations externes
    | (FeexPay, geCloud, Brevo / Sendinblue, etc.)
    |--------------------------------------------------------------------------
    */

    'feexpay' => [
        'base_url' => env('FEEXPAY_BASE_URL', 'https://api.feexpay.com'),
        'public_key' => env('FEEXPAY_PUBLIC_KEY'),
        'secret_key' => env('FEEXPAY_SECRET_KEY'),
        'callback_url' => env('FEEXPAY_CALLBACK_URL', 'https://yourdomain.com/api/payments/callback'),
    ],

    'gecloud' => [
        'base_url' => env('GECLOUD_BASE_URL', 'https://api.gecloud.com'),
        'api_key' => env('GECLOUD_API_KEY'),
        'account_id' => env('GECLOUD_ACCOUNT_ID'),
        'invoice_callback' => env('GECLOUD_INVOICE_CALLBACK', 'https://yourdomain.com/api/invoices/update'),
    ],

    'brevo' => [
        'base_url' => env('BREVO_BASE_URL', 'https://api.brevo.com/v3'),
        'api_key' => env('BREVO_API_KEY'),
        'list_id' => env('BREVO_LIST_ID'), // liste pour newsletter
        'sender_email' => env('BREVO_SENDER_EMAIL', 'noreply@yourdomain.com'),
        'sender_name' => env('BREVO_SENDER_NAME', 'Rotary Club'),
    ],

    // Autres services futurs
    'whatsapp' => [
        'enabled' => env('WHATSAPP_ENABLED', false),
        'api_url' => env('WHATSAPP_API_URL'),
        'api_token' => env('WHATSAPP_API_TOKEN'),
    ],

];


// return [

//     /*
//     |--------------------------------------------------------------------------
//     | Third Party Services
//     |--------------------------------------------------------------------------
//     |
//     | This file is for storing the credentials for third party services such
//     | as Mailgun, Postmark, AWS and more. This file provides the de facto
//     | location for this type of information, allowing packages to have
//     | a conventional file to locate the various service credentials.
//     |
//     */

//     'mailgun' => [
//         'domain' => env('MAILGUN_DOMAIN'),
//         'secret' => env('MAILGUN_SECRET'),
//         'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
//     ],

//     'postmark' => [
//         'token' => env('POSTMARK_TOKEN'),
//     ],

//     'ses' => [
//         'key' => env('AWS_ACCESS_KEY_ID'),
//         'secret' => env('AWS_SECRET_ACCESS_KEY'),
//         'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
//     ],

// ];
