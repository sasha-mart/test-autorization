<?php

namespace SashaMart\TestAutorization;

class Router
{
    static function getPage(string $requestUri)
    {
        $controller = new Controller();
        $requestUri = explode('/', $requestUri);

        if ($requestUri[1] == '' && method_exists($controller,'index'))
            $controller->index();
        elseif (method_exists($controller, $requestUri[1])) {
            $method = $requestUri[1];
            $controller->$method();
        }
        else {
            header('HTTP/1.0 404 not found');
            echo "Страница не найдена";
        }
    }
}