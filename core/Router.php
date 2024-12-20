<?php
namespace coreFramework;

class Router
{

    /* protected Request $request;
    protected Response $response; */
    protected array $routes = [];
    protected array $routes_params = [];

    /* public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    } */

    public function __construct(
        protected Request $request,
        protected Response $response
    )
    {
        
    }

    public function add($path, $callback, $method) : self
    {
        $path = trim($path, '/');
        if(is_array($method)){
            $method = array_map('strtoupper', $method);
        }
        else
        {
            $method = [strtoupper($method)];
        }
        $this->routes[] =  [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null, 
            'method' => $method,
            'needToken' => true,

        ];

        return $this;
        
    }

    public function get($path, $callback) : self
    {
        return $this->add($path, $callback, 'GET');
    }
    public function post($path, $callback) : self
    {
        return $this->add($path, $callback, 'POST');
    }
    

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch(): mixed
    {

        $path = $this->request->getPath();
        $route = $this->matchRoute($path);
        if(!$route){
            $this->response->setResponseCode(404);
            echo '404-Page not found';
            die;
        }
        if(is_array($route['callback']))
        {
            $route['callback'][0] = new $route['callback'][0];
            
        }
        return call_user_func($route['callback']);
    }

    protected function matchRoute($path) :mixed
    {
        foreach($this->routes as $route)
        {
            if(preg_match("#^{$route['path']}$#", "/{$path}", $matches) && in_array($this->request->getMethod(), $route['method'])){

                foreach($matches as $key => $value)
                {
                    if(is_string($key)){
                        $this->routes_params[$key] = $value;
                    }
                }
                return $route;
            }
                        
        }
        return false;
    }




}
?>