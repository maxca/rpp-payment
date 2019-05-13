<?php return [

    /*
    |--------------------------------------------------------------------------
    | Setting authentication
    |--------------------------------------------------------------------------
    */
    'basic' => [
        'auth'     => [
            'username' => env('RPP_USERNAME'),
            'password' => env('RPP_PASSWORD')
        ],
    ],


    /*
   |--------------------------------------------------------------------------
   | Setting curl GuzzleHttp
   |--------------------------------------------------------------------------
   */
    'curl'     => [
        'http_errors' => false,
        'headers'     => [
            'Accept' => 'application/json',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Setting endpoint
    |--------------------------------------------------------------------------
    */
    'endpoint' => [

        /*
        |--------------------------------------------------------------------------
        | Setting endpoint of otp
        |--------------------------------------------------------------------------
        */
        'otp'  => [
            'request' => env('RPP_PAYMENT_URL') . '/payment/api/wallet/otp',
            'verify'  => env('RPP_PAYMENT_URL') . '/payment/api/wallet/otp/verify',
        ],

        /*
        |--------------------------------------------------------------------------
        | Setting endpoint of auth
        |--------------------------------------------------------------------------
        */
        'auth' => env('RPP_PAYMENT_URL') . '/uaa/oauth/token',

        /*
        |--------------------------------------------------------------------------
        | Setting endpoint of payment
        |--------------------------------------------------------------------------
        */

        'payment'  => [
            'base'         => env('RPP_PAYMENT_URL'),
            'charge'       => env('RPP_PAYMENT_URL') . '/payment/api/charge',
            'transactions' => env('RPP_PAYMENT_URL') . '/payment/api/transactions',
            'cancel'       => env('RPP_PAYMENT_URL') . '/payment/api/charge/cancel'
        ],

        /*
        |--------------------------------------------------------------------------
        | Setting endpoint of merchant
        |--------------------------------------------------------------------------
        */
        'merchant' => [
            'base'   => env('RPP_MERCHANT_URL'),
            'search' => env('RPP_MERCHANT_URL') . '/master-merchant/v1/api/merchants'
        ],

    ],

];
