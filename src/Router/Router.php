<?php

namespace Mvsjunior\VolgPhp\Router;

class Router 
{
    private $routes;


    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
    }

    public function handle()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}