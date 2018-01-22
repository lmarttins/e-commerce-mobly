<?php

namespace EcommerceMobly\Domains\Products\Contracts;

interface FeatureServiceContract
{
    /**
     * Service create Feature record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Service update Feature record.
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
     * Service find Feature record.
     *
     * @param  string|int $id
     * @return mixed
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