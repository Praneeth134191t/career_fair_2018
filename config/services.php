<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twitter' => [
        'client_id' => 'tchXp9siW7B10CFJVAl1QmO9c',
        'client_secret' => '5zXuPCkGgDF71uAkTntB9pOBrOUgjrKbl0aJvMoS3fvIJWPYAK',
        'redirect' => 'http://intecs.itfac.mrt.ac.lk/careers/callback/twitter',
        'white_list' => 'B12_tweet,cfairproject', //ex: B12_tweet,B13_tweet,B14_tweet
        // NB: do not add public twitter accounts
    ],

];
