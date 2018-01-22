<?php

namespace EcommerceMobly\Domains\Products\Repositories;

use EcommerceMobly\Domains\Products\Models\Product;
use EcommerceMobly\Support\Persistence\Repository;
use EcommerceMobly\Domains\Products\Contracts\ProductRepositoryContract;

/**
 * Class ProductRepository
 * @package EcommerceMobly\Domains\Products\Repositories
 */
class ProductRepository extends Repository implements
    ProductRepositoryContract
{
    protected $modelClass = Product::class;
}