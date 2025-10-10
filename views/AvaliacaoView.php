<?php

require_once "../controllers/AvaliacaoController.php";

final class AvaliacaoView
{

    private $avaliacaoController;

    function __construct()
    {
        $this->avaliacaoController = new AvaliacaoController();    
    }

    function getAvaliacoesPorCidade($cidade) {
        $avaliacoes = $this->avaliacaoController->getAvaliacoesPorCidade($cidade);

        foreach($avaliacoes as $avaliacao) {

            $data_avaliacao = new DateTime($avaliacao['data_avaliacao']);
            $data_avaliacao = $data_avaliacao->format("Postado em j de F de Y");
            echo "<div class=\"review-card\">";
            echo "<div class=\"review-header\">";
            echo "<span class=\"review-author\">{$avaliacao['nome_usuario']}</span>";
            echo "<div class=\"review-rating\">";
            for ($i = 0; $i < $avaliacao['nota']; $i++) {
                echo "<span class=\"star\">&#9733;</span>";
            }
            if($avaliacao['nota'] != 5) {
                for ($i = 0; $i < $avaliacao['nota'] - 5; $i++) {
                    echo "<span class=\"star\">&#9734;</span>";
                }
            }
            echo "</div>";
            echo "</div>";
            echo "<p class=\"review-text\">\"{$avaliacao['comentario']}\"</p>";
            echo "<span class=\"review-date\">{$data_avaliacao}</span>";
            echo "</div>";
        }
    }
}

?>