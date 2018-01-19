<?php

namespace EcommerceMobly\Domains\Products\Contracts;

interface CategoryRepositoryContract
{
    /**
     * Create Category record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Update Category record.
     *
     * @param  array $data
     * @param  $id
     * @return mixed
     */
    public function update($id, array $data = []);

    /**
     * Create pagination.
     *
     * @return mixed
     */
    public function paginate();

    /**
     * Find record.
     *
     * @param  string|int $id
     * @return \EcommerceMobly\Domains\Products\Models\Category
     */
    public function find($id);
}