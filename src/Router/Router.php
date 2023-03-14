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

        if($this->verifyIfRouteIsRegistred($uri))
        {
            echo "Rota registrada";
        }
        else
        {
            echo "Rota não registrada";
        }
    }


    public function verifyIfRouteIsRegistred($uri)
    {
        $rotaNaoRegistrada = false;
        $rotaRegistrada    = true;

        $route = isset($this->routes[$uri]) ? $this->routes[$uri] : "";

        if(empty($route))
        {
            return $rotaNaoRegistrada;
        }
        else
        {
            return $rotaRegistrada;
        }
    }
}