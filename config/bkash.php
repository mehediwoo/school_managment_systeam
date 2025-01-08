<?php
// Config::all();
// dd(Config::all());
return [





'default' => env('BKASH_DRIVER', ''), // Default driver

    // 'drivers' => [
    //     'database' => [
    //         'bkash_app_key' => '',  // These will be overridden by Service Provider
    //         'bkash_app_secret' => '',
    //         'bkash_username' => '',
    //         'bkash_password' => '',
    //         // 'payment_mode' => 'sandbox', // e.g., sandbox or live
    //     ],

    //     // You can add other drivers if necessary, like 'file' or 'api'
    // ],











    "sandbox"         => env("BKASH_SANDBOX", "false"),

    "bkash_app_key"     => env("BKASH_APP_KEY", ""),
    "bkash_app_secret" => env("BKASH_APP_SECRET", ""),
    "bkash_username"      => env("BKASH_USERNAME", ""),
    "bkash_password"     => env("BKASH_PASSWORD", ""),
    'base_url' => env('BKASH_ENVIRONMENT') === 'live' ? 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/create' : '',



    // "bkash_app_key_2"     => env("BKASH_APP_KEY_2", ""),
    // "bkash_app_secret_2" => env("BKASH_APP_SECRET_2", ""),
    // "bkash_username_2"      => env("BKASH_USERNAME_2", ""),
    // "bkash_password_2"     => env("BKASH_PASSWORD_2", ""),

    // "bkash_app_key_3"     => env("BKASH_APP_KEY_3", ""),
    // "bkash_app_secret_3" => env("BKASH_APP_SECRET_3", ""),
    // "bkash_username_3"      => env("BKASH_USERNAME_3", ""),
    // "bkash_password_3"     => env("BKASH_PASSWORD_3", ""),

    // "bkash_app_key_4"     => env("BKASH_APP_KEY_4", ""),
    // "bkash_app_secret_4" => env("BKASH_APP_SECRET_4", ""),
    // "bkash_username_4"      => env("BKASH_USERNAME_4", ""),
    // "bkash_password_4"     => env("BKASH_PASSWORD_4", ""),

    // "callbackURL"     => env("BKASH_CALLBACK_URL", "http://127.0.0.1:8000/bkash/callback"),
    // 'timezone'        => 'Asia/Dhaka',




    // "bkash_app_key"     => env("BKASH_APP_KEY"),
    // "bkash_app_secret" => env("BKASH_APP_SECRET"),
    // "bkash_username"      => env("BKASH_USERNAME"),
    // "bkash_password"     => env("BKASH_PASSWORD"),
    // 'base_url' => env('BKASH_ENVIRONMENT') === 'live' ? 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/create' : '',
    // "bkash_app_key_2"     => env("BKASH_APP_KEY_2", ""),
    // "bkash_app_secret_2" => env("BKASH_APP_SECRET_2", ""),
    // "bkash_username_2"      => env("BKASH_USERNAME_2", ""),
    // "bkash_password_2"     => env("BKASH_PASSWORD_2", ""),

    // "bkash_app_key_3"     => env("BKASH_APP_KEY_3", ""),
    // "bkash_app_secret_3" => env("BKASH_APP_SECRET_3", ""),
    // "bkash_username_3"      => env("BKASH_USERNAME_3", ""),
    // "bkash_password_3"     => env("BKASH_PASSWORD_3", ""),

    // "bkash_app_key_4"     => env("BKASH_APP_KEY_4", ""),
    // "bkash_app_secret_4" => env("BKASH_APP_SECRET_4", ""),
    // "bkash_username_4"      => env("BKASH_USERNAME_4", ""),
    // "bkash_password_4"     => env("BKASH_PASSWORD_4", ""),

    "callbackURL"     => env("BKASH_CALLBACK_URL"),
    'timezone'        => 'Asia/Dhaka',
];


