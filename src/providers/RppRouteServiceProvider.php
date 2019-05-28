<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use ReflectionClass;

/**
 * Class RppRouteServiceProvider
 * @package App\Providers
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class RppRouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $basepath;

    /**
     * RppRouteServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @throws \ReflectionException
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        $this->basepath = $this->resolveBasePath();
    }

    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     * @var string
     */
    protected $namespace = 'Samark\RppPayment\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::namespace($this->namespace)
            ->group(realpath($this->basepath .'/http/routes/RppRoute.php'));
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    protected function resolveBasePath()
    {
        return dirname(
            (new ReflectionClass($this))->getFileName(), 2
        );
    }

}
