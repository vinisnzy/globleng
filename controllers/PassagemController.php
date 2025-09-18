<?php

require_once __DIR__ . '/../models/PassagemModel.php';

final class PassagemController 
{
    private PassagemModel $passagemModel;

    function __construct() 
    {
        $this->passagemModel = new PassagemModel();
    }

    function listarPassagensPorDestino($destino)
    {
        $this->passagemModel->listarPassagensPorDestino($destino);
    }

    function menorPrecoPorDestino($destino)
    {
        return $this->passagemModel->menorPrecoPorDestino($destino);
    }
}

?>