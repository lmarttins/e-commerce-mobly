<?php

namespace EcommerceMobly\Domains\Users\Repositories;

use EcommerceMobly\Domains\Users\Contracts\AddressRepositoryContract;
use EcommerceMobly\Domains\Users\Models\Address;
use EcommerceMobly\Support\Persistence\Repository;

/**
 * Class AddressRepository
 * @package EcommerceMobly\Domains\Users\Repositories
 */
class AddressRepository extends Repository implements
    AddressRepositoryContract
{
    protected $modelClass = Address::class;
}