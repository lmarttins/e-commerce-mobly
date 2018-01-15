<?php

namespace EcommerceMobly\Support\Routing;

abstract class Route
{
    /**
     * Options to route
     *
     * @var array
     */
    protected $options;

    /**
     * Router
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * Route constructor class
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options  = $options;
        $this->router   = app('router');
    }

    /**
     * Define routes
     *
     * @return void
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    /**
     * Set routes
     *
     * @return void
     */
    abstract protected function routes();
}