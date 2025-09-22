<?php

require_once __DIR__ . '/../controllers/PassagemController.php';

final class PassagemView 
{
    private PassagemController $passagemController;

    function __construct()
    {
        $this->passagemController = new PassagemController();
    }

    function listarPassagensPorDestino($destino)
    {
        $passagens = $this->passagemController->listarPassagensPorDestino($destino);

        $count = 0;
        foreach ($passagens as $passagem) {
            $count++;

            $duracao_em_horas_e_minutos = str_replace(":", "h", substr($passagem['duracao_voo'], 0, 5));
            $check_in_date = new DateTime($passagem['check_in']);
            $check_out_date = new DateTime($passagem['check_out']);

            if ($count > 3) {
                echo "<li class=\"pass oculto\">";
            } else {
                echo "<li class=\"pass\">";
            }
            echo "<i class=\"fa-solid fa-plane\"></i>";
            echo "<div class=\"pass-info\">";
            echo "<p>" . htmlspecialchars($check_in_date->format('d/m/Y')) . " - " . htmlspecialchars($check_out_date->format('d/m/Y')) . "</p>";
            echo "<p>" . htmlspecialchars($passagem['cidade_origem']) . " - " . htmlspecialchars($destino) . "</p>";
            echo "<p>" . htmlspecialchars($duracao_em_horas_e_minutos) . " de vôo</p>";
            echo "</div>";
            echo "<p class=\"pass-price\"><span class=\"fi fi-br\"></span>R$ " . number_format($passagem['preco'], 2, ',', '.') . "</p>";
            echo "</li>";
        }
    }

    function menorPrecoPorDestino($destino)
    {
        return $this->passagemController->menorPrecoPorDestino($destino);
    }
}

?>