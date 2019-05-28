<?php

namespace Samark\RppPayment\Providers;

use Arcanedev\Support\PackageServiceProvider;
use Samark\RppPayment\Services\Rpp\RppService;
use Samark\RppPayment\Facades\RppPayment;
use App\Providers\RppRouteServiceProvider;

/**
 * Class RppServiceProvider
 * @package Samark\RppPayment\Providers
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class RppServiceProvider extends PackageServiceProvider
{
    /**
     * @var string $vendor name
     */
    protected $vendor = 'samarkchaisanguan';

    /**
     * @var string $package name
     */
    protected $package = 'rpp-payment';

    /**
     * register provider
     */
    public function register()
    {
        parent::register();

        $this->app->bind('RppPayment', function ($app) {
            return $app->make(RppService::class);
        });

        $this->registerProvider(RppRouteServiceProvider::class);

    }

    /**
     * on booting application
     */
    public function boot()
    {
        parent::boot();
        $this->publishConfig();
    }

    /**
     * register alias name of class
     */
    public function registerAliases()
    {
        $this->alias(RppPayment::class, 'rpp');
    }
}