<?php

$env = env('APP_ENV');
$isLocal = ($env != 'prod' && $env != 'production');

return [
    'api_key_test' => env('ENGAGEBAY_API_KEY_TEST'),
    'api_key_prod' => env('ENGAGEBAY_API_KEY_PROD'),
    'api_key' => $isLocal ? env('ENGAGEBAY_API_KEY_TEST') : env('ENGAGEBAY_API_KEY_PROD'),
    'contact_create' => env('ENGAGEBAY_CONTACT_CREATE', 'https://app.engagebay.com/dev/api/panel/subscribers/subscriber'),
    'contact_update' => env('ENGAGEBAY_CONTACT_PARTIAL_UPDATE', 'https://app.engagebay.com/dev/api/panel/subscribers/update-partial'),
    'contact_by_email' => env('ENGAGEBAY_CONTACT_GET_BY_EMAIL', 'https://app.engagebay.com/dev/api/panel/subscribers/contact-by-email/%s'),
    'contact_by_id' => env('ENGAGEBAY_CONTACT_GET_BY_EMAIL', 'https://app.engagebay.com/dev/api/panel/subscribers/%d'),
];
