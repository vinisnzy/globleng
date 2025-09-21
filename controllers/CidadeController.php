<?php

require_once "../models/CidadeModel.php";

final class CidadeController
{
    private $cidadeModel;

    function __construct()
    {
        $this->cidadeModel = new CidadeModel();
    }

    function getReviewsPorCidade($cidade)
    {
        return $this->cidadeModel->getReviewsPorCidade($cidade);
    }

    function getIdCidadePorNome($nome)
    {
        return $this->cidadeModel->getIdCidadePorNome($nome);
    }
}
