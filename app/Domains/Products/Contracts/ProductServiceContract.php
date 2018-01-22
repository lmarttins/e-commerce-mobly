<?php

namespace EcommerceMobly\Domains\Products\Contracts;

use EcommerceMobly\Domains\Products\Models\Product;

interface ProductServiceContract
{
    /**
     * Service create resource.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []): Product;

    /**
     * Service update resource.
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
     * Service find resource.
     *
     * @param  string|int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Service delete resource.
     *
     * @param  string|int $id
     * @return bool|null
     */
    public function delete($id);
}