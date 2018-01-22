<?php

namespace EcommerceMobly\Domains\Users\Repositories;

use EcommerceMobly\Domains\Users\Models\User;
use EcommerceMobly\Support\Persistence\Repository;
use EcommerceMobly\Domains\Users\Contracts\UserRepositoryContract;

/**
 * Class UserRepository
 * @package EcommerceMobly\Domains\Users\Repositories
 */
class UserRepository extends Repository implements
    UserRepositoryContract
{
    protected $modelClass = User::class;
}