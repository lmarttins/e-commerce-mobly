<?php

namespace EcommerceMobly\Domains\Users\Contracts;

use EcommerceMobly\Domains\Users\Models\Address;

interface AddressServiceContract
{
    /**
     * Service create resource.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data = []): Address;
}