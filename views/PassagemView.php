<?php

require_once __DIR__ . '/../controllers/PassagemController.php';

final class PassagemView 
{
    private PassagemController $passagemController;

    function __construct()
    {
        $this->passagemController = new PassagemController();
    }

    function listarPassagensPorDestino($destino)
    {
        $this->passagemController->listarPassagensPorDestino($destino);
    }

    function menorPrecoPorDestino($destino)
    {
        return $this->passagemController->menorPrecoPorDestino($destino);
    }
}

?>