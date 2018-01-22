<?php

namespace EcommerceMobly\Domains\Products\Services;

use EcommerceMobly\Domains\Products\Contracts\OrderRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\OrderServiceContract;
use EcommerceMobly\Domains\Products\Models\Order;
use EcommerceMobly\Domains\Users\Contracts\AddressRepositoryContract;
use Illuminate\Support\Fluent;
use EcommerceMobly\Domains\Users\Contracts\UserRepositoryContract;

class OrderService implements OrderServiceContract
{
    /**
     * @var OrderRepositoryContract
     */
    private $orderRepository;

    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    /**
     * @var AddressRepositoryContract
     */
    private $addressRepository;

    public function __construct(
        OrderRepositoryContract $orderRepository,
        UserRepositoryContract $userRepository,
        AddressRepositoryContract $addressRepository)
    {
        $this->orderRepository   = $orderRepository;
        $this->userRepository    = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Service create resource.
     *
     * @param  array $data
     * @return Order
     */
    public function create(array $data = []): Order
    {
        $data = new Fluent($data);

        $order = $this->orderRepository->create($data->toArray());

        if ($data->offsetExists('products')) {
            $order->products()->attach($data->products);
        }

        if ($data->offsetExists('user')) {
            $user = $this->userRepository->create($data->user);
            $order->user()->associate($user);
            $order->save();
        }

        if ($data->offsetExists('address')) {
            $address = $this->addressRepository->create($data->address);
            $order->address()->associate($address);
            $order->save();
        }

        return $order;
    }

    /**
     * Service update Category record.
     *
     * @param  $id
     * @param  array $data
     * @return mixed
     */
    public function update($id, array $data = [])
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Service create pagination.index
     *
     * @return mixed
     */
    public function paginate()
    {
        return $this->repository->paginate();
    }

    /**
     * Service find Category.
     *
     * @param int|string $id
     * @return \EcommerceMobly\Domains\Products\Models\Category
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Service delete resource.
     *
     * @param  int|string $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    /**
     * Service upload image.
     *
     * @param UploadedFile $file
     * @param $id
     */
    public function saveImage(UploadedFile $file, $id)
    {
        $image = [
            'image' => $file->store('product/images')
        ];

        $this->repository->update($id, $image);
    }
}