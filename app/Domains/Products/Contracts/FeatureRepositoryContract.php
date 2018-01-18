<?php

namespace EcommerceMobly\Domains\Products\Contracts;

interface FeatureRepositoryContract
{
    /**
     * Create Feature record.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Update Feature record.
     *
     * @param  array $data
     * @param  $id
     * @return mixed
     */
    public function update(array $data = [], $id);
}