<?php

namespace EcommerceMobly\Domains\Products\Repositories;

use EcommerceMobly\Domains\Products\Models\Category;
use EcommerceMobly\Support\Persistence\Repository;
use EcommerceMobly\Domains\Products\Contracts\CategoryRepositoryContract;

/**
 * Class CategoryRepository
 * @package EcommerceMobly\Domains\Products\Repositories
 */
class CategoryRepository extends Repository implements
    CategoryRepositoryContract
{
    protected $modelClass = Category::class;
}