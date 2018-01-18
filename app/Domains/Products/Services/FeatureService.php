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
     * Service create Feature record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->repository->create($data);
    }

    /**
     * Service update Feature record.
     *
     * @param  $id
     * @param  array $data
     * @return mixed
     */
    public function update($id, array $data = [])
    {
        return $this->repository->update($id, $data);
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
}