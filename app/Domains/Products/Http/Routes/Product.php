<?php

namespace EcommerceMobly\Domains\Products\Http\Routes;

use EcommerceMobly\Support\Routing\Route;

class Product extends Route
{
    /**
     * Set routes
     *
     * @return void
     */
    protected function routes()
    {
        $this->router->group(['prefix' => 'v1'], function () {
            $this->router->apiResource('products', 'ProductController');
        });
    }
}