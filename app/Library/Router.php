<?php

declare(strict_types=1);

namespace App\Library;

use App\Library\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $method, string $route, $action): self
    {
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function get(string $route, $action): self
    {
        $this->register('GET', $route, $action);
        return $this;
    }

    public function post(string $route, $action)
    {
        $this->register('POST', $route, $action);
        return $this;
    }

    public function resolve(string $method, string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$method][$route] ?? null;
        if (!$action)
        {
            throw new RouteNotFoundException();
        }

        if (is_callable($action))
        {
            return call_user_func($action);
        } else {
            return $action;
        }

    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}