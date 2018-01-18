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

    public function update($id, array $data = []);

    public function paginate();
}