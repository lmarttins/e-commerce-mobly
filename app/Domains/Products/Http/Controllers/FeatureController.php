<?php

namespace EcommerceMobly\Domains\Products\Http\Controllers;

use EcommerceMobly\Support\Http\Controllers\ApiController;
use EcommerceMobly\Domains\Products\Contracts\FeatureRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FeatureController extends ApiController
{
    /**
     * @var FeatureRepositoryContract
     */
    private $service;

    public function __construct(FeatureRepositoryContract $service)
    {
        $this->service = $service;
    }

    /**
     * Store resource Feature.
     *
     * @param  Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ],[
                'name.required' => 'Nome obrigatório.'
            ]);

            $this->service->create($request->all());

            return $this->response()->withSuccess(
                'Característica do produto criada com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Ocorreu um erro ao criar a característica.'
            );
        }
    }
}