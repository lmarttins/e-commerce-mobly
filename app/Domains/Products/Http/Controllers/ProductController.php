<?php

namespace EcommerceMobly\Domains\Products\Http\Controllers;

use EcommerceMobly\Domains\Products\Contracts\ProductServiceContract;
use EcommerceMobly\Domains\Products\Exceptions\ProductNotCreateException;
use EcommerceMobly\Domains\Products\Http\Resources\ProductResource;
use EcommerceMobly\Support\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends ApiController
{
    /**
     * @var ProductServiceContract
     */
    private $service;

    /**
     * ProductController constructor.
     * @param ProductServiceContract $service
     */
    public function __construct(ProductServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * List resources.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection($this->service->paginate());
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
            $this->validate($request, [
                'name'  => 'required',
                'price' => 'required',
            ],[
                'name.required'  => 'Nome obrigatório.',
                'price.required' => 'Preço obrigatório.',
            ]);

            $this->service->create($request->all());

            return $this->response()->withSuccess(
                'Produto criado com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (ProductNotCreateException $e) {
            return $this->response()->withError(
                'Não foi possível criar o produto.'
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Ocorreu um problema ao processar a criação do produto.'
            );
        }
    }

    /**
     * Update resource.
     *
     * @param  $id
     * @param  Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        try {
            $this->validate($request, [
                'name'  => 'required',
                'price' => 'required',
            ],[
                'name.required'  => 'Nome obrigatório.',
                'price.required' => 'Preço obrigatório.',
            ]);

            $this->service->update($id, $request->all());

            return $this->response()->withSuccess(
                'Produto atualizado com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Ocorreu um erro ao atualizar o produto.'
            );
        }
    }

    /**
     * Show resource.
     *
     * @param  string|int $id
     * @return ProductResource|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        try {
            return new ProductResource($this->service->find($id));
        } catch (\Exception $e) {
            return $this->response()->withNotFound(
                'Não foi possível encontrar o produto.'
            );
        }
    }

    /**
     * @param  string|int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        try {
            $this->service->delete($id);

            return $this->response()->withSuccess(
                'Produto excluído com sucesso!'
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Não foi possível excluir o produto.'
            );
        }
    }
}