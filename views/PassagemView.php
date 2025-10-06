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

            $origem = $passagem['cidade_origem'];
            $check_in_date = new DateTime($passagem['check_in']);
            $check_out_date = new DateTime($passagem['check_out']);
            $duracao_em_horas_e_minutos = str_replace(":", "h", substr($passagem['duracao_voo'], 0, 5));
            $preco = number_format($passagem['preco'], 2, ',', '.');
            $id_passagem = $passagem['id'];

            $passagem = "<li class=\"pass";
            if ($count > 3) {
                $passagem .= " oculto";
            }
            $passagem .= "\"";
            echo $passagem . " data-origem=\"" . $origem . "\" " .
            " data-destino=\"" . $destino . "\" " .
            " data-checkin=\"" . $check_in_date->format('h:i d/m/Y') . "\" " .
            " data-checkout=\"" . $check_out_date->format('h:i d/m/Y') . "\""  .
            " data-duracao=\"" . $duracao_em_horas_e_minutos . "\"" .
            " data_preco=\"" . $preco . "\"" .
            " data-url-compra=\"./compra.php?id=" . $id_passagem . "\">";
            echo "<i class=\"fa-solid fa-plane\"></i>";
            echo "<div class=\"pass-info\">";
            echo "<p>" . htmlspecialchars($check_in_date->format('d/m/y')) . " - " . htmlspecialchars($check_out_date->format('d/m/y')) . "</p>";
            echo "<p>" . htmlspecialchars($origem) . " - " . htmlspecialchars($destino) . "</p>";
            echo "<p>" . htmlspecialchars($duracao_em_horas_e_minutos) . " de vôo</p>";
            echo "</div>";
            echo "<p class=\"pass-price\"><span class=\"fi fi-br\"></span>R$ " . $preco . "</p>";
            echo "</li>";
        }
    }

    function menorPrecoPorDestino($destino)
    {
        return $this->passagemController->menorPrecoPorDestino($destino);
    }
}

?>