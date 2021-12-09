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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '1072922818074-u7hd4bp361mpkp2vcdia3kg7rjl242j9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    
    'recaptcha'=> [
        'origin' => env('RECAPTCHAV3_ORIGIN', 'https://www.google.com/recaptcha'),
        'sitekey' => env('RECAPTCHAV3_SITEKEY', ''),
        'secret' => env('RECAPTCHAV3_SECRET', '')
    ],

];
