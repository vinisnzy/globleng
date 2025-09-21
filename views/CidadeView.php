<?php

require_once __DIR__ . '/../controllers/CidadeController.php';

final class CidadeView
{
    private $cidadeController;

    function __construct()
    {
        $this->cidadeController = new CidadeController();
    }

    function getReviewsPorCidade($cidade) {
        return $this->cidadeController->getReviewsPorCidade($cidade);
    }

    function getIdCidadePorNome($nome)
    {
        return $this->cidadeController->getIdCidadePorNome($nome);
    }
}

?>