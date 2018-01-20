<?php

namespace Tests\Feature;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response as HttpStatus;

class CategoryControllerTest extends TestCase
{
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
        $response = $this->json('PUT', '/api/v1/categories/1', [
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
        $response = $this->json('GET', '/api/v1/categories');

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Celular Smartphone',
                        'description' => 'Todos os tipos de celular'
                    ],
                ]
            ]);
    }

    public function testShowSuccess()
    {
        $response = $this->json('GET', '/api/v1/categories/1');

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
        $response = $this->json('DELETE', '/api/v1/categories/1');

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Categoria removida com sucesso!'
            ]);
    }
}
