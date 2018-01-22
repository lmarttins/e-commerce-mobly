<?php

namespace EcommerceMobly\Domains\Products\Contracts;

use EcommerceMobly\Domains\Products\Models\Order;

interface OrderServiceContract
{
    /**
     * Service create record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []): Order;

    /**
     * Service update record.
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

    /**
     * Service delete record.
     *
     * @param  string|int $id
     * @return bool|null
     */
    public function delete($id);
}