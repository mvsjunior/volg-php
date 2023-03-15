<?php

namespace Mvsjunior\VolgPhp\Router;

class Router 
{
    const CLASS_NAME   = 0;
    const CLASS_METHOD = 1;
    const ROUTE_ACTION = "action";
    const REQUEST_GET  = "GET";
    const REQUEST_POST = "POST";

    private $routes;

    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
    }

    public function handle()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $params = $_GET;

        if($this->verifyIfRouteIsRegistred($uri))
        {
            $classAndMethod = explode("@", $this->routes[ $uri ][ self::ROUTE_ACTION ]);
            $class          = $classAndMethod[ self::CLASS_NAME ];
            $method         = $classAndMethod[ self::CLASS_METHOD] ;

            if(class_exists($class))
            {
                $instance = new $class;
                
                if(is_callable([$instance, $method]))
                {
                    call_user_func([$instance, $method], $params);
                }
                else
                {
                    echo "Método inválido";
                }
            }
            else
            {
                echo "{$class} classe não encontrada :(";
            }
            
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