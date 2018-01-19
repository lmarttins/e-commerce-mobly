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
     * Create pagination.
     *
     * @return mixed
     */
    public function paginate();
}