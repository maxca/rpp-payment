<?php return [

    /*
    |--------------------------------------------------------------------------
    | Setting authentication
    |--------------------------------------------------------------------------
    */
    'basic'      => [
        'auth' => [
            env('RPP_USERNAME'),
            env('RPP_PASSWORD'),
        ],
    ],
    'grant_type' => 'client_credentials',


    /*
   |--------------------------------------------------------------------------
   | Setting curl GuzzleHttp
   |--------------------------------------------------------------------------
   */
    'curl'       => [
        'http_errors' => false,
        'headers'     => [
            'Accept'       => 'application/json',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Setting endpoint
    |--------------------------------------------------------------------------
    */
    'endpoint'   => [

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


    /*
    |--------------------------------------------------------------------------
    | Setting token store to session ,
    | default is store
    |--------------------------------------------------------------------------
    */

    'token' => [
        'name'  => 'rpp.token', // session name
        'store' => true, // set store to session
    ],

];
