<?php

require_once __DIR__ . '/../controllers/CidadeController.php';

final class CidadeView
{
    private $cidadeController;

    function __construct()
    {
        $this->cidadeController = new CidadeController();
    }

    function getReviewsPorCidade($cidade)
    {
        return $this->cidadeController->getReviewsPorCidade($cidade);
    }

    function getIdCidadePorNome($nome)
    {
        return $this->cidadeController->getIdCidadePorNome($nome);
    }

    function exibirCarrosselPorCidade($cidade)
    {
        echo "<section class=\"carousel-section\">";
        echo "<button class=\"carousel-btn left\">";
        echo  "<i class=\"fa fa-chevron-left\"></i>";
        echo  "</button>";

        echo  "<div class=\"carousel-container\">";
        echo  "<div class=\"carousel-track\">";
        for ($i = 1; $i <= 5; $i++) {
            $imagem = $cidade . $i;
            echo  "<img src=\"../assets/imgs/carrossel/" . $cidade . "/" . $imagem . ".jpg\" alt=\"" . $imagem . "\" />";
        }
        echo  "</div>";
        echo  "</div>";

        echo "<button class=\"carousel-btn right\">";
        echo "<i class=\"fa fa-chevron-right\"></i>";
        echo "</button>";
        echo "</section>";
    }
}
