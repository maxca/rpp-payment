<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'rpp-payment', 'as' => 'rpp-payment.'], function ($router) {

    $router->post('/token', 'RppController@token')->name('token');
    $router->post('/otp', 'RppController@requestOtp')->name('otp.request');
    $router->post('/otp/verify', 'RppController@verify')->name('otp.verify');
    $router->post('/charge', 'RppController@charge')->name('charge');
    $router->post('/cancel', 'RppController@cancel')->name('cancel');
});

