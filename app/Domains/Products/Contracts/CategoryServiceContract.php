<?php

namespace EcommerceMobly\Domains\Products\Contracts;

interface CategoryServiceContract
{
    /**
     * Service create Category record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Service update Category record.
     *
     * @param  string|int $id
     * @param  array $data
     * @return mixed
     */
    public function update($id, array $data = []);

    /**
     * Service create pagination.
     *
     * @return mixed
     */
    public function paginate();

    /**
     * Service find record.
     *
     * @param  string|int $id
     * @return \EcommerceMobly\Domains\Products\Models\Category
     */
    public function find($id);
}