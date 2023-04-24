<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            echo 'Not found';
            exit;
        }

        echo call_user_func($callback);
    }
}
