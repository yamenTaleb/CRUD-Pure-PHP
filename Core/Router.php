<?php

namespace Core;

use Core\Response;

class Router
{
    public $routes = [];

    public function add($uri, $controller, $method)
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    }
    public function get(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function put(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function patch(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function router(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require base_path($route['controller']);
                break;
            }
        }

        abort();
    }
}