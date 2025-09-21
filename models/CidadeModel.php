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
        $id_cidade = $this->getIdCidadePorNome($cidade);
        $stmt = $this->connection->prepare("SELECT reviews FROM cidades WHERE nome = ?");
        $stmt->bind_param("s", $cidade);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = $result->fetch_assoc();
        return number_format(floor($reviews['reviews']), 0 , "", ".");
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
}
