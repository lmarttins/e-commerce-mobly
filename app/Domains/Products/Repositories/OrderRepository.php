<?php

namespace EcommerceMobly\Domains\Products\Repositories;

use EcommerceMobly\Domains\Products\Models\Order;
use EcommerceMobly\Support\Persistence\Repository;
use EcommerceMobly\Domains\Products\Contracts\OrderRepositoryContract;

/**
 * Class OrderRepository
 * @package EcommerceMobly\Domains\Products\Repositories
 */
class OrderRepository extends Repository implements
    OrderRepositoryContract
{
    protected $modelClass = Order::class;
}