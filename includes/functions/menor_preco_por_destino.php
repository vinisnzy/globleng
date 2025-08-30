<?php
require_once './includes/conexao.php';

function menorPrecoPorDestino($destino)
{
    global $conn;

    $stmt = $conn->prepare("SELECT MIN(preco) AS menor_preco FROM passagens WHERE destino = ?");
    $stmt->bind_param("s", $destino);
    $stmt->execute();
    $result = $stmt->get_result();
    $preco = $result->fetch_assoc();
    return number_format(floor($preco['menor_preco']), 0, ",", ".");
}
