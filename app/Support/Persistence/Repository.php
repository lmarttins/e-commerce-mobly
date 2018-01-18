<?php

namespace EcommerceMobly\Support\Persistence;

abstract class Repository
{
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

    public function create(array $data = [])
    {
        return app()->make($this->modelClass)->create($data);
    }

    public function update(array $data = [], $id)
    {
        return app()->make($this->modelClass)->update($data, $id);
    }
}