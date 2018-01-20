<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response as HttpStatus;
use EcommerceMobly\Domains\Products\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreSuccess()
    {
        $response = $this->json('POST', '/api/v1/categories', [
            'name' => 'Celular',
            'description' => 'Todos os tipos de celular'
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Categoria criada com sucesso!'
            ]);
    }

    public function testValidationSuccess()
    {
        $response = $this->json('POST', '/api/v1/categories', [
            'name' => ''
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'message' => [
                    'name' => ['Nome obrigatório.']
                ]
            ]);
    }

    public function testUpdateSuccess()
    {
        $category = factory(Category::class)->create([
            'name' => 'Celular Smartphone'
        ]);

        $response = $this->json('PUT', '/api/v1/categories/' . $category->id, [
            'name' => 'Celular Smartphone'
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Categoria atualizada com sucesso!'
            ]);
    }

    public function testListSuccess()
    {
        factory(Category::class)->create([
            'name' => 'Celular smartphone',
            'description' => 'Todos os tipos de celular'
        ]);

        $response = $this->json('GET', '/api/v1/categories');

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Celular smartphone',
                        'description' => 'Todos os tipos de celular'
                    ],
                ]
            ]);
    }

    public function testShowSuccess()
    {
        $category = factory(Category::class)->create([
            'name' => 'Celular Smartphone',
            'description' => 'Todos os tipos de celular'
        ]);

        $response = $this->json('GET', '/api/v1/categories/' . $category->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'name' => 'Celular Smartphone',
                    'description' => 'Todos os tipos de celular'
                ]
            ]);
    }

    public function testDestroySuccess()
    {
        $category = factory(Category::class)->create([
            'name' => 'Celular Smartphone',
            'description' => 'Todos os tipos de celular'
        ]);

        $response = $this->json('DELETE', '/api/v1/categories/' . $category->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Categoria removida com sucesso!'
            ]);
    }
}
