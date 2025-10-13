<?php

require_once __DIR__ . "/../config/Database.php";

final class CidadeModel
{

    private $connection;

    function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection;
    }

    function getReviewsPorCidade($cidade)
    {
        $stmt = $this->connection->prepare("SELECT reviews FROM cidades WHERE nome = ?");
        $stmt->bind_param("s", $cidade);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = $result->fetch_assoc();
        return $reviews['reviews'];
    }

    function getIdCidadePorNome($nome)
    {
        $stmt = $this->connection->prepare("SELECT id FROM cidades WHERE nome = ?");
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();
        $cidade = $result->fetch_assoc();
        return $cidade['id'];
    }

    function getNomeCidadePorId($id)
    {
        $stmt = $this->connection->prepare("SELECT nome FROM cidades WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cidade = $result->fetch_assoc();
        return $cidade['nome'];
    }
}
