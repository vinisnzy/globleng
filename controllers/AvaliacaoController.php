<?php

require_once "../models/AvaliacaoModel.php";

final class AvaliacaoController
{
    private $avaliacaoModel;

    function __construct()
    {
        $this->avaliacaoModel = new AvaliacaoModel();
    }

    function getAvaliacoesPorCidade($cidade) {
        return $this->avaliacaoModel->getAvaliacoesPorCidade($cidade);
    }
}

?>