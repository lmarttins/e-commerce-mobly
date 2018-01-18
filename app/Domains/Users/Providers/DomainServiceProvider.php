<?php

namespace EcommerceMobly\Domains\Users\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * DomainServiceProvider
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}