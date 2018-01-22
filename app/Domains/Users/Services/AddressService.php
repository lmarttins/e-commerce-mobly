<?php

namespace EcommerceMobly\Domains\Users\Services;

use EcommerceMobly\Domains\Products\Exceptions\AddressNotCreateException;
use EcommerceMobly\Domains\Users\Contracts\AddressRepositoryContract;
use EcommerceMobly\Domains\Users\Contracts\AddressServiceContract;
use EcommerceMobly\Domains\Users\Models\Address;
use Illuminate\Support\Fluent;

class AddressService implements AddressServiceContract
{
    /**
     * @var AddressRepositoryContract
     */
    private $repository;

    public function __construct(AddressRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Service create resource.
     *
     * @param  array $data
     * @return Address
     * @throws AddressNotCreateException
     */
    public function create(array $data = []): Address
    {
        $data = new Fluent($data);

        $address = $this->repository->create($data->toArray());

        if (!$address instanceof Address) {
            throw new AddressNotCreateException('could not create address');
        }

        return $address;
    }
}