<?php

namespace Tests\Feature;

use EcommerceMobly\Domains\Products\Models\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response as HttpStatus;

class FeatureControllerTest extends TestCase
{
    use RefreshDatabase;

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
        $feature = factory(Feature::class)->create([
            'name' => 'Memória de 60GB'
        ]);

        $response = $this->json('PUT', '/api/v1/features/' . $feature->id, [
            'name' => 'Memória de 60GB'
        ]);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Característica do produto atualizada com sucesso!'
            ]);
    }

    public function testListSuccess()
    {
        factory(Feature::class)->create([
            'name' => 'Memória de 60GB',
            'description' => 'Memória de smartphone'
        ]);

        $response = $this->json('GET', '/api/v1/features');

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Memória de 60GB',
                        'description' => 'Memória de smartphone'
                    ],
                ]
            ]);
    }

    public function testShowSuccess()
    {
        $feature = factory(Feature::class)->create([
            'name' => 'Memória de 60GB',
            'description' => 'Memória de smartphone'
        ]);

        $response = $this->json('GET', '/api/v1/features/' . $feature->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'name' => 'Memória de 60GB',
                    'description' => 'Memória de smartphone'
                ]
            ]);
    }

    public function testDestroySuccess()
    {
        $feature = factory(Feature::class)->create([
            'name' => 'Memória de 60GB',
            'description' => 'Memória de smartphone'
        ]);

        $response = $this->json('DELETE', '/api/v1/features/' . $feature->id);

        $response
            ->assertStatus(HttpStatus::HTTP_OK)
            ->assertJson([
                'message' => 'Característica removida com sucesso!'
            ]);
    }
}
