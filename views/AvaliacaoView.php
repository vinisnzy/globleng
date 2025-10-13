<?php

require_once "../controllers/AvaliacaoController.php";
require_once "CidadeView.php";

final class AvaliacaoView
{

    private $avaliacaoController;
    private $cidadeView;

    function __construct()
    {
        $this->avaliacaoController = new AvaliacaoController();
        $this->cidadeView = new CidadeView();  
    }

    function getAvaliacoesPorCidade($cidade) {
        $avaliacoes = $this->avaliacaoController->getAvaliacoesPorCidade($cidade);

        // Formatação e tradução da data de avaliação do usuário
        $data_avaliacao_pattern = "d 'de' MMMM 'de' y";

        $formatter = new IntlDateFormatter(
            'pt_BR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'America/Sao_Paulo',
            IntlDateFormatter::GREGORIAN,
            $data_avaliacao_pattern
        );

        foreach($avaliacoes as $avaliacao) {
            
            $data_avaliacao = new DateTime($avaliacao['data_avaliacao']);

            echo "<div class=\"review-card\">";
            echo "<div class=\"review-header\">";
            echo "<span class=\"review-author\">{$avaliacao['nome_usuario']}</span>";
            echo "<div class=\"review-rating\">";
            for ($i = 0; $i < $avaliacao['nota']; $i++) {
                echo "<span class=\"star\">&#9733;</span>";
            }
            if($avaliacao['nota'] < 5) {
                for ($i = $avaliacao['nota']; $i < 5; $i++) {
                    echo "<span class=\"star\">&#9734;</span>";
                }
            }
            echo "</div>";
            echo "</div>";
            echo "<p class=\"review-text\">\"{$avaliacao['comentario']}\"</p>";
            echo "<span class=\"review-date\">{$formatter->format($data_avaliacao)}</span>";
            echo "</div>";
        }
    }

    function inserirAvaliacao($usuario_id, $cidade_id, $nota, $comentario) {
        $nome_cidade = $this->cidadeView->getNomeCidadePorId($cidade_id);
        $nome_cidade = strtolower($nome_cidade);
        $avaliacaoResponse = $this->avaliacaoController->inserirAvaliacao($usuario_id, $cidade_id, $nota, $comentario);
        header("Location: ../public/cidade.php?nome={$nome_cidade}&status={$avaliacaoResponse->getStatus()}&message={$avaliacaoResponse->getMessage()}#reviews");
    }
}

?>