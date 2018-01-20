<?php

namespace EcommerceMobly\Domains\Products\Http\Controllers;

use EcommerceMobly\Domains\Products\Contracts\CategoryServiceContract;
use EcommerceMobly\Domains\Products\Http\Resources\CategoryResource;
use EcommerceMobly\Support\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends ApiController
{
    /**
     * @var CategoryServiceContract
     */
    private $service;

    /**
     * CategoryController constructor.
     * @param CategoryServiceContract $service
     */
    public function __construct(CategoryServiceContract $service)
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
        return CategoryResource::collection($this->service->paginate());
    }

    /**
     * Store resource.
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
                'Categoria criada com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Ocorreu um erro ao criar a categoria.'
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
                'name' => 'required'
            ],[
                'name.required' => 'Nome obrigatório.'
            ]);

            $this->service->update($id, $request->all());

            return $this->response()->withSuccess(
                'Categoria atualizada com sucesso!'
            );
        } catch (ValidationException $e) {
            return $this->response()->withUnprocessableEntity(
                $e->errors()
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Ocorreu um erro ao atualizar a categoria.'
            );
        }
    }

    /**
     * @param  string|int $id
     * @return CategoryResource|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        try {
            return new CategoryResource($this->service->find($id));
        } catch (\Exception $e) {
            return $this->response()->withNotFound(
                'Não foi possível encontrar a categoria.'
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
                'Categoria excluir com sucesso!'
            );
        } catch (\Exception $e) {
            return $this->response()->withError(
                'Não foi possível excluir a categoria.'
            );
        }
    }
}