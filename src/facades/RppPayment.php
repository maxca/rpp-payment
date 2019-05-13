<?php

namespace Samark\RppPayment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string version()
 * @method static string basePath()
 * @method static string environment()
 * @method static string token()
 * @method static string getToken()
 * @method static string requestOtp($params)
 * @method static string verifyOtp()
 * @method static string charge()
 * @method static string refund()
 *
 * @see \Illuminate\Foundation\Application
 */

class RppPayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RppPayment';
    }
}