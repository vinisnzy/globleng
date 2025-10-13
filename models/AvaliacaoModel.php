<?php

require_once __DIR__ . "/../config/Database.php";
include_once __DIR__ . "/../dtos/AvaliacaoResponse.php";

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
        $avaliacoes = $result->fetch_all(MYSQLI_ASSOC);
        return $avaliacoes;
    }

    function inserirAvaliacao($usuario_id, $cidade_id, $nota, $comentario) {
        $avaliacaoResponse = $this->verificarAvaliacaoExistente($usuario_id, $cidade_id);
        if (isset($avaliacaoResponse)) {
            return $avaliacaoResponse;
        }
        $stmt = $this->connection->prepare("INSERT INTO avaliacoes(usuario_id, cidade_id, nota, comentario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $usuario_id, $cidade_id, $nota, $comentario);
        $stmt->execute();
        $stmt->close();
        return new AvaliacaoResponse("success", "Avaliação inserida com sucesso");
    }

    private function verificarAvaliacaoExistente($usuario_id, $cidade_id) {
        $stmt = $this->connection->prepare("SELECT COUNT(usuario_id) AS quantidade_avaliacoes FROM avaliacoes WHERE usuario_id = ? AND cidade_id = ?");
        $stmt->bind_param("ii", $usuario_id, $cidade_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row['quantidade_avaliacoes'] > 0) {
            return new AvaliacaoResponse("error", "Você já inseriu uma avaliação para essa cidade");
        }
    }
}
?>