<?php

namespace EcommerceMobly\Support\Http\Controllers;

use EcommerceMobly\Support\Http\Response;
use EcommerceMobly\App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    /**
     * Get responses
     *
     * @return \EcommerceMobly\Support\Http\Response
     */
    public function response()
    {
        return app(Response::class);
    }
}