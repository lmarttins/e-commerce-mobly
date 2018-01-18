<?php

namespace EcommerceMobly\Domains\Products\Repositories;

use EcommerceMobly\Domains\Products\Models\Feature;
use EcommerceMobly\Support\Persistence\Repository;
use EcommerceMobly\Domains\Products\Contracts\FeatureRepositoryContract;

/**
 * Class FeatureRepository
 * @package EcommerceMobly\Domains\Products\Repositories
 */
class FeatureRepository extends Repository implements
    FeatureRepositoryContract
{
    protected $modelClass = Feature::class;
}