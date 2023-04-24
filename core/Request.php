<?php

namespace app\core;

class Request
{
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $positon = strpos($path, '?');
        if (!$positon) return $path;

        return substr($path, 0, $positon);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
