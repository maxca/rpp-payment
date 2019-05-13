<?php

namespace Samark\RppPayment\Providers;

use Arcanedev\Support\PackageServiceProvider;
use Samark\RppPayment\Services\Rpp\RppService;

class RppServiceProvider extends PackageServiceProvider
{
    protected $vendor = 'samarkchaisanguan';

    protected $package = 'rpp-payment';

    public function register()
    {
        parent::register();

        $this->app->bind('RppService', function ($app) {
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
        $this->alias(RppService::class, 'rpp');
    }
}