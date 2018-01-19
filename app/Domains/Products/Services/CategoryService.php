<?php

namespace EcommerceMobly\Domains\Products\Services;

use EcommerceMobly\Domains\Products\Contracts\CategoryRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\CategoryServiceContract;

class CategoryService implements CategoryServiceContract
{
    /**
     * @var CategoryRepositoryContract
     */
    private $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Service create Category record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->repository->create($data);
    }

    /**
     * Service update Category record.
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
     * Service find Category.
     *
     * @param int|string $id
     * @return \EcommerceMobly\Domains\Products\Models\Category
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }
}