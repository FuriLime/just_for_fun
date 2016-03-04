<?php


$secrets = json_decode(file_get_contents($_SERVER['APP_SECRETS']), true);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */



    'mailgun' => [
        'domain' => 'sandboxfc55bc60d1724e7d80be2fdf0703029a.mailgun.org',
        'secret' => 'key-b289879e94af3b05606c2d484c06d1ae',
    ],

    'mandrill' => [
        'secret' => $secrets['CUSTOM']['MANDRILL_PASSWORD'],
    ],

    'mailchimp' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
//
//    'facebook' => [
//        'client_id' => $secrets['CUSTOM']['FACEBOOK_APP_ID'],
//        'client_secret' => $secrets['CUSTOM']['FACEBOOK_APP_SECRET'],
//        'redirect' => $secrets['CUSTOM']['FACEBOOK_CALLBACK_URL'],
//    ],

    'facebook' => [
        'client_id' => '1685286605050549',
        'client_secret' => '7aa94a9144725b0eb4c14eb3f6bb3ed8',
        'redirect' => 'http://event.test-y-sbm.com/oauthfacebook',
    ],

    'twitter' => [
        'client_id' => $secrets['CUSTOM']['TWITTER_API_KEY'],
        'client_secret' => $secrets['CUSTOM']['TWITTER_API_SECRET'],
        'redirect' => $secrets['CUSTOM']['TWITTER_CALLBACK_URL'],
    ],

    'linkedin' => [
        'client_id' => $secrets['CUSTOM']['LINKEDIN_ID'],
        'client_secret' => $secrets['CUSTOM']['LINKEDIN_SECRET'],
        'redirect' => $secrets['CUSTOM']['LINKEDIN_CALLBACK_URL'],
    ],

    'google' => [
        'client_id' => $secrets['CUSTOM']['GOOGLE_CLIENT_ID'],
        'client_secret' => $secrets['CUSTOM']['GOOGLE_SECRET'],
        'redirect' => $secrets['CUSTOM']['GOOGLE_CALLBACK_URL'],
    ],


];
