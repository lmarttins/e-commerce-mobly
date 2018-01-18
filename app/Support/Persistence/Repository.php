<?php

namespace EcommerceMobly\Support\Persistence;

abstract class Repository
{
    /**
     * Model instance class
     *
     * @var string $modelClass
     */
    protected $modelClass;

    /**
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|null $query
     * @param  int $take
     * @param  bool $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\AbstractPaginator
     */
    public function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (is_null($query)) {
            $query = $this->newQuery();
        }

        if (true == $paginate) {
            return $query->paginate($take);
        }

        if ($take > 0 || false !== $take) {
            $query->take($take);
        }

        return $query->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function newQuery()
    {
        return app()->make($this->modelClass)->newQuery();
    }

    /**
     * Create record in database.
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data = [])
    {
        return app()->make($this->modelClass)->create($data);
    }

    /**
     * Update record in database.
     *
     * @param  string|int $id
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data = [])
    {
        $model = app()->make($this->modelClass)->find($id);

        return $model->update($data);
    }

    public function paginate()
    {
        return app()->make($this->modelClass)->paginate();
    }
}