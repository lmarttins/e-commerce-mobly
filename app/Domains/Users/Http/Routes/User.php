<?php

namespace EcommerceMobly\Domains\Users\Http\Routes;

use EcommerceMobly\Support\Routing\Route;

class User extends Route
{
    /**
     * Set routes
     *
     * @return void
     */
    protected function routes()
    {
        $this->router->group(['prefix' => 'v1'], function () {
            $this->router->apiResource('users', 'UserController');
        });
    }
}