<?php

namespace Samark\RppPayment\Providers;

use Arcanedev\Support\PackageServiceProvider;
use Samark\RppPayment\Services\Rpp\RppService;
use Samark\RppPayment\Facades\RppPayment;

class RppServiceProvider extends PackageServiceProvider
{
    protected $vendor = 'samarkchaisanguan';

    protected $package = 'rpp-payment';

    public function register()
    {
        parent::register();

        $this->app->bind('RppPayment', function ($app) {
            return $app->make(RppService::class);
        });

    }

    public function boot()
    {
        parent::boot();
        $this->publishConfig();
    }

    public function registerAliases()
    {
        dd(RppPayment::class);
        $this->alias(RppPayment::class, 'rpp');
        dd(app('rpp'));
    }
}