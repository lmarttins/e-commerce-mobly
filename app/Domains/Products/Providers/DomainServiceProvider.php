<?php

namespace EcommerceMobly\Domains\Products\Providers;

use EcommerceMobly\Domains\Products\Contracts\FeatureRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\FeatureServiceContract;
use EcommerceMobly\Domains\Products\Repositories\FeatureRepository;
use EcommerceMobly\Domains\Products\Services\FeatureService;
use EcommerceMobly\Support\Domain\ServiceProvider;

/**
 * DomainServiceProvider
 */
class DomainServiceProvider extends ServiceProvider
{
    protected $bindings = [
        FeatureRepositoryContract::class => FeatureRepository::class,
        FeatureServiceContract::class => FeatureService::class,
    ];

    protected $routes = [
        RouteServiceProvider::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}