<?php

namespace EcommerceMobly\Domains\Products\Services;

use EcommerceMobly\Domains\Products\Contracts\FeatureRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\FeatureServiceContract;

class FeatureService implements FeatureServiceContract
{
    /**
     * @var FeatureRepositoryContract
     */
    private $repository;

    public function __construct(FeatureRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Service create Particular record.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->repository->create($data);
    }
}