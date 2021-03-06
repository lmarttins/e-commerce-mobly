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

    /**
     * Service create pagination.
     *
     * @return mixed
     */
    public function paginate()
    {
        return $this->repository->paginate();
    }

    /**
     * Service find Feature record.
     *
     * @param int|string $id
     * @return \EcommerceMobly\Domains\Products\Models\Feature
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Service delete resource.
     *
     * @param  int|string $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}