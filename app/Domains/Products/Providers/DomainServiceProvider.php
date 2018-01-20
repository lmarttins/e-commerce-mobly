<?php

namespace EcommerceMobly\Domains\Products\Providers;

use EcommerceMobly\Domains\Products\Contracts\CategoryRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\CategoryServiceContract;
use EcommerceMobly\Domains\Products\Contracts\FeatureRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\FeatureServiceContract;
use EcommerceMobly\Domains\Products\Contracts\ProductRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\ProductServiceContract;
use EcommerceMobly\Domains\Products\Repositories\CategoryRepository;
use EcommerceMobly\Domains\Products\Repositories\FeatureRepository;
use EcommerceMobly\Domains\Products\Repositories\ProductRepository;
use EcommerceMobly\Domains\Products\Services\CategoryService;
use EcommerceMobly\Domains\Products\Services\FeatureService;
use EcommerceMobly\Domains\Products\Services\ProductService;
use EcommerceMobly\Support\Domain\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package EcommerceMobly\Domains\Products\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    protected $bindings = [
        FeatureRepositoryContract::class => FeatureRepository::class,
        FeatureServiceContract::class => FeatureService::class,
        CategoryRepositoryContract::class => CategoryRepository::class,
        CategoryServiceContract::class => CategoryService::class,
        ProductRepositoryContract::class => ProductRepository::class,
        ProductServiceContract::class => ProductService::class,
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