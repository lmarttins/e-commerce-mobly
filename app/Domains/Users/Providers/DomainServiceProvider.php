<?php

namespace EcommerceMobly\Domains\Users\Providers;

use EcommerceMobly\Domains\Users\Contracts\AddressRepositoryContract;
use EcommerceMobly\Domains\Users\Contracts\UserRepositoryContract;
use EcommerceMobly\Domains\Users\Repositories\AddressRepository;
use EcommerceMobly\Domains\Users\Repositories\UserRepository;
use EcommerceMobly\Support\Domain\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package EcommerceMobly\Domains\Users\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    protected $bindings = [
        UserRepositoryContract::class => UserRepository::class,
        AddressRepositoryContract::class => AddressRepository::class,
    ];

    protected $routes = [
        RouteServiceProvider::class,
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