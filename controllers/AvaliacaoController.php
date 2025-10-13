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

    function inserirAvaliacao($usuario_id, $cidade_id, $nota, $comentario) {
        $comentario = trim($comentario);
        return $this->avaliacaoModel->inserirAvaliacao($usuario_id, $cidade_id, $nota, $comentario);
    }
}

?>