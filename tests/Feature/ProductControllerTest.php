<?php

namespace Tests\Feature;

use EcommerceMobly\Domains\Products\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response as HttpStatus;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreSuccess()
    {
        $response = $this->json('POST', '/api/v1/products', [
            'name' => 'Ihpone 8',
            'description' => 'Smartphone',
            'price' => 4000
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Produto criado com sucesso!'
            ]);
    }

    public function testValidationSuccess()
    {
        $response = $this->json('POST', '/api/v1/products', [
            'name' => '',
            'price' => ''
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'message' => [
                    'name' => ['Nome obrigatório.'],
                    'price' => ['Preço obrigatório.']
                ]
            ]);
    }

    public function testUpdateSuccess()
    {
        $product = factory(Product::class)->create([
            'name' => 'Iphone 7',
            'price' => 4000
        ]);

        $response = $this->json('PUT', '/api/v1/products/' . $product->id, [
            'name' => 'Iphone 8',
            'price' => 4000
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Produto atualizado com sucesso!'
            ]);
    }

    public function testListSuccess()
    {
        factory(Product::class)->create([
            'name' => 'Iphone 8',
            'description' => 'Melhor celular do planeta'
        ]);

        $response = $this->json('GET', '/api/v1/products');

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Iphone 8',
                        'description' => 'Melhor celular do planeta'
                    ],
                ]
            ]);
    }

    public function testShowSuccess()
    {
        $product = factory(Product::class)->create([
            'name' => 'Iphone 8',
            'description' => 'Melhor celular do planeta',
            'price' => 4000
        ]);

        $response = $this->json('GET', '/api/v1/products/' . $product->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    'name' => 'Iphone 8',
                    'description' => 'Melhor celular do planeta',
                    'price' => 4000
                ]
            ]);
    }

    public function testDestroySuccess()
    {
        $product = factory(Product::class)->create([
            'name' => 'Iphone 8',
            'description' => 'Melhor celular do planeta'
        ]);

        $response = $this->json('DELETE', '/api/v1/products/' . $product->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Produto excluído com sucesso!'
            ]);
    }
}
