<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public array $routes = [];

    public function add($uri, $controller, $method): static
    {
        $middleware = null;

        $this->routes[] = compact('uri', 'controller', 'method', 'middleware');

        return $this;
    }
    public function get(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): static
    {
       return $this->add($uri, $controller, 'DELETE');
    }

    public function put(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function patch(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function router(string $uri, string $method): void
    {
        $route = null;
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                Middleware::resolve($route['middleware']);

                require base_path('http/controller/' . $route['controller']);
                break;
            }
        }
        if (! ($route['uri'] === $uri && $route['method'] === $method)) {
            abort();
        }
    }

    public function previousURL(): string
    {
       return $_SERVER['HTTP_REFERER'];
    }

    public function only(string $key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }
}