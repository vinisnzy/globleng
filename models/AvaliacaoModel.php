<?php

require_once __DIR__ . "/../config/Database.php";

final class AvaliacaoModel
{
    private $connection;

    function __construct() {
        $database = new Database();
        $this->connection = $database->connection;
    }

    function getAvaliacoesPorCidade($cidade) {
        $stmt = $this->connection->prepare("SELECT u.nome AS nome_usuario, a.nota, a.comentario, a.data_avaliacao FROM avaliacoes a LEFT JOIN cidades c ON a.cidade_id = c.id RIGHT JOIN usuarios u ON a.usuario_id = u.id WHERE c.nome = ?;");
        $stmt->bind_param("s", $cidade);
        $stmt->execute();
        $result = $stmt->get_result();
        $avalicoes = $result->fetch_all();
        return $avalicoes;
    }
}
?>