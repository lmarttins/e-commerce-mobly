<?php

namespace Tests\Feature;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response as HttpStatus;

class FeatureControllerTest extends TestCase
{
    public function testStoreSuccess()
    {
        $response = $this->json('POST', '/api/v1/features', [
            'name' => 'Memória de 4GB',
            'description' => 'Memória de smartphone'
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Característica do produto criada com sucesso!'
            ]);
    }

    public function testValidationSuccess()
    {
        $response = $this->json('POST', '/api/v1/features', [
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
        $response = $this->json('PUT', '/api/v1/features/1', [
            'name' => 'Memória de 60GB'
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Característica do produto atualizada com sucesso!'
            ]);
    }
}
