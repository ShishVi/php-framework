<?php

namespace SimpleFramework;

class Router
{
    protected array $routes = [];

    protected array $route_params = [];

    public function __construct(protected Request $request, protected Response $response)
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
            'method' => is_array($method) ? $method : [$method],
            'csrFToken' => true,
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
        $path = $this->request->getPath();
        $route =  $this->matchRoute($path);
        if(!$route){
            $this->response->setResponseCode(404);
            echo "404-Page not found";
            die();
        }

        if(is_array($route['callback']) && isset($route['callback'][0])){
            $route['callback'][0] = new $route['callback'][0];
        }
        dump($route);
        return call_user_func($route['callback']);


    }

    protected function matchRoute($path):mixed
    {
        foreach($this->routes as $route){
            if(preg_match("#^{$route['path']}$#", "/{$path}", $matches)
            && in_array($this->request->getMethod(), $route['method']??[])
            ){

                foreach ($matches as $k=>$v)
                {
                    if(is_string($k)){
                        $this->route_params[$k] = $v;
                    }
                }

                return $route;
            }
        }
        return false;
    }

}