<?php

namespace SimpleFramework;

class Router
{
    protected array $routes = [];

    protected array $routes_params = [];

    public function __construct(Request $request, Response $response)
    {
    }

    public function add($path, $callback, $method):self
    {
        $path = trim($path, '/');

        if(is_array($method)){
            $method = array_map('strtoupper', $method);
        }else{
            $method = strtoupper($method);
        }

        $this->routes[] = [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null,
            'method' => $method
        ];

        return $this;
    }

    public function get($path, $callback):self
    {
        return $this->add($path, $callback, 'GET');
    }
    public function post($path, $callback):self
    {
        return $this->add($path, $callback, 'POST');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch():mixed
    {
        return "TEST";
    }

}