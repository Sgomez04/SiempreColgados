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

    'facebook' => [
        'client_id' => '298591248841449',
        'client_secret' => '547c98635615826705b1cfd6588d58bc',
        'redirect' => '/externalLogin/facebook',
    ],

    'google' => [
        'client_id' => '567630826127-os5tovdvnfuc6h81gkkgd1tsptrd25jq.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/externalLogin/google',
    ],
];
