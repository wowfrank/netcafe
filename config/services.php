<?php

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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => Netcafe\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'baidu' => [
        'client_id'         => env('BAIDU_KEY'),
        'client_secret'     => env('BAIDU_SECRET'),
        'redirect'          => env('BAIDU_REDIRECT_URI'),
    ],
    'qq' => [
        'client_id'         => env('QQ_KEY'),
        'client_secret'     => env('QQ_SECRET'),
        'redirect'          => env('QQ_REDIRECT_URI'),
    ],
    'weibo' => [
        'client_id'         => env('WEIBO_KEY'),
        'client_secret'     => env('WEIBO_SECRET'),
        'redirect'          => env('WEIBO_REDIRECT_URI'),
    ],
    'weixinweb' => [
        'client_id'          => env('WEIXINWEB_KEY'),
        'client_secret'      => env('WEIXINWEB_SECRET'),
        'redirect'           => env('WEIXINWEB_REDIRECT_URI'),
    ],
    'googlemapapi' => [
        'google_api_key'    => env('GOOGLE_GMAP_API_KEY'),
        'lat'               => env('GMAP_LATITUDE'),
        'lng'              => env('GMAP_LONGITUDE'),
    ],

];
