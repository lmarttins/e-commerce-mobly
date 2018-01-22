<?php

namespace EcommerceMobly\Domains\Products\Contracts;

interface ProductRepositoryContract
{
    /**
     * Create record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Update record.
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
     * @return \EcommerceMobly\Domains\Products\Models\Product
     */
    public function find($id);

    /**
     * Delete record.
     *
     * @param  string|int $id
     * @return mixed
     */
    public function delete($id);
}