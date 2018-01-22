<?php

namespace EcommerceMobly\Domains\Products\Http\Controllers;

use EcommerceMobly\Domains\Products\Contracts\OrderServiceContract;
use EcommerceMobly\Support\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends ApiController
{
    /**
     * @var OrderServiceContract
     */
    private $service;

    /**
     * ProductController constructor.
     * @param OrderServiceContract $service
     */
    public function __construct(OrderServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * Store resource.
     *
     * @param  Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        try {
            $this->service->create($request->all());

            return $this->response()->withSuccess(
                'Pedido criado com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $this->response()->withError(
                'Ocorreu um problema ao processar o pedido.'
            );
        }
    }
}