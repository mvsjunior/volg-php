<?php

namespace Mvsjunior\VolgPhp\example;

class ExampleController {

    public function index($params = [])
    {
        print_r($_GET);
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        echo "ExampleController - index <br> nome: {$nome}";
    }
}