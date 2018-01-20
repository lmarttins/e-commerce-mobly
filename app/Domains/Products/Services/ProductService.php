<?php

namespace EcommerceMobly\Domains\Products\Services;

use EcommerceMobly\Domains\Products\Contracts\ProductRepositoryContract;
use EcommerceMobly\Domains\Products\Contracts\ProductServiceContract;
use EcommerceMobly\Domains\Products\Models\Product;
use EcommerceMobly\Domains\Products\Exceptions\ProductNotCreateException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Fluent;

class ProductService implements ProductServiceContract
{
    /**
     * @var ProductRepositoryContract
     */
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Service create resource.
     *
     * @param  array $data
     * @return \EcommerceMobly\Domains\Products\Http\Routes\Product|Product
     * @throws ProductNotCreateException
     */
    public function create(array $data = []): Product
    {
        $data = new Fluent($data);

        $product = $this->repository->create($data->toArray());

        if (!$product instanceof Product) {
            throw new ProductNotCreateException('could not create product');
        }

        if ($data->offsetExists('categories')) {
            $product->categories()->attach($data->categories);
        }

        if ($data->offsetExists('features')) {
            $product->features()->attach($data->features);
        }

        return $product;
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