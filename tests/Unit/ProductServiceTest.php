<?php

namespace Tests\Unit;

use EcommerceMobly\Domains\Products\Contracts\ProductRepositoryContract;
use EcommerceMobly\Domains\Products\Models\Product;
use EcommerceMobly\Domains\Products\Services\ProductService;
use Tests\TestCase;
use Mockery as m;

class ProductServiceTest extends TestCase
{
    public function testMustCreateProduct()
    {
        $repository = m::mock(ProductRepositoryContract::class);

        $repository->shouldReceive('create')
            ->andReturn(new Product());

        $product = (new ProductService($repository))
            ->create([
                'name' => 'Iphone 8',
                'price' => 4000
            ]);

        $this->assertInstanceOf(Product::class, $product);
    }
}