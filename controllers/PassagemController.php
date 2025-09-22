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
        return $this->passagemModel->listarPassagensPorDestino($destino);
    }

    function menorPrecoPorDestino($destino)
    {
        $menor_preco = $this->passagemModel->menorPrecoPorDestino($destino);
        return number_format(floor($menor_preco), 0, ",", ".");
    }
}

?>