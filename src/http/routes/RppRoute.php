<?php

namespace Samark\RppPayment\Http\Routes;

use Arcanedev\Support\Routing\RouteRegistrar;

/**
 * Class RppRoute
 * @package Samark\RppPayment\Http\Routes
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class RppRoute extends RouteRegistrar
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Map all routes.
     */
    public function map()
    {
        $this->name('rpp-payments::')->group(function () {
            $this->mapModuleRoutes();
        });
    }

    /**
     * Map the logs routes.
     */
    private function mapModuleRoutes()
    {
        $this->group([
            'prefix' => 'rpp',
            'as'     => 'rpp.'
        ], function () {
            $this->post('/token', 'RppController@token')->name('token');
            $this->post('/otp', 'RppController@requestOtp')->name('otp.request');
            $this->post('/otp/verify', 'RppController@verify')->name('otp.verify');
            $this->post('/charge', 'RppController@charge')->name('charge');
            $this->post('/cancel', 'RppController@cancel')->name('cancel');

        });

    }
}
