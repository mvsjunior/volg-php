<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/vendor/autoload.php";

use Mvsjunior\VolgPhp\Router\Router;

$router = new Router;

    $router->setRoutes(
        [
            "/teste" => [
                "uri"    => "/teste", 
                "action" => "\\Mvsjunior\\VolgPhp\\example\\ExampleController@index",
                "requestMethod" => "GET",

            ],
            "/home" => [
                "uri"    => "/home", 
                "action" => "\\Mvsjunior\\VolgPhp\\example\\ExampleController@index",
                "requestMethod" => "GET"
            ],
            "/album-de-fotos" => [
                "uri"    => "/album-de-fotos", 
                "action" => "\\Mvsjunior\\VolgPhp\\example\\ExampleController@index",
                "requestMethod" => "GET"
                ]
        ]
    );

$router->handle();