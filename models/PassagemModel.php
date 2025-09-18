<?php

require_once __DIR__ . '/../config/Database.php';

final class PassagemModel
{
    private $connection;

    function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection;
    }

    function listarPassagensPorDestino($destino)
    {
        $stmt = $this->connection->prepare("SELECT check_in, check_out, origem, destino, preco, duracao_voo FROM passagens WHERE destino = ?");
        $stmt->bind_param("s", $destino);
        $stmt->execute();
        $result = $stmt->get_result();
        $passagens = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

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
            echo "<p>" . htmlspecialchars($passagem['origem']) . " - " . htmlspecialchars($passagem['destino']) . "</p>";
            echo "<p>" . htmlspecialchars($duracao_em_horas_e_minutos) . " de vôo</p>";
            echo "</div>";
            echo "<p class=\"pass-price\"><span class=\"fi fi-br\"></span>R$ " . number_format($passagem['preco'], 2, ',', '.') . "</p>";
            echo "</li>";
        }
    }


    function menorPrecoPorDestino($destino)
    {
        $stmt = $this->connection->prepare("SELECT MIN(preco) AS menor_preco FROM passagens WHERE destino = ?");
        $stmt->bind_param("s", $destino);
        $stmt->execute();
        $result = $stmt->get_result();
        $preco = $result->fetch_assoc();
        return number_format(floor($preco['menor_preco']), 0, ",", ".");
    }
}
?>