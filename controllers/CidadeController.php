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
        $reviews = $this->cidadeModel->getReviewsPorCidade($cidade);
        return number_format(floor($reviews), 0 , "", ".");
    }

    function getIdCidadePorNome($nome)
    {
        return $this->cidadeModel->getIdCidadePorNome($nome);
    }
}
