<?php

namespace EcommerceMobly\Support\Domain;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var array Contract bindings
     */
    protected $bindings = [];

    /**
     * @var array RouteServiceProvider
     */
    protected $routes = [];

    /**
     * Register domain.
     */
    public function register()
    {
        $this->registerBindings(collect($this->bindings));
        $this->registerRoutes(collect($this->routes));
    }

    /**
     * Register domain bindings.
     *
     * @param Collection $bindings
     */
    public function registerBindings(Collection $bindings)
    {
        $bindings->each(function ($concretion, $abstraction) {
           $this->app->bind($abstraction, $concretion);
        });
    }

    /**
     * Register any application services.
     *
     * @param Collection $routes
     */
    public function registerRoutes(Collection $routes)
    {
        $routes->each(function ($routeClass) {
            $this->app->register($routeClass);
        });
    }
}