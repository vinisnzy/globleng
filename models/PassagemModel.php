<?php

require_once __DIR__ . '/../config/Database.php';
require_once '../views/CidadeView.php';

final class PassagemModel
{
    private $connection;
    private $cidadeView;

    function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection;
        $this->cidadeView = new CidadeView();
    }

    function listarPassagensPorDestino($destino)
    {
        $id_cidade_destino = $this->getIdCidadePorNome($destino);

        $query = "SELECT p.id, p.check_in, p.check_out, origem.nome AS cidade_origem, p.preco, p.duracao_voo FROM passagens p
        LEFT JOIN cidades origem ON p.cidade_origem_id = origem.id
        LEFT JOIN cidades destino ON p.cidade_destino_id = destino.id
        WHERE destino.id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $id_cidade_destino);
        $stmt->execute();
        $result = $stmt->get_result();
        $passagens = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $passagens;
    }

    function menorPrecoPorDestino($destino)
    {
        $id_destino = $this->getIdCidadePorNome($destino);
        $stmt = $this->connection->prepare("SELECT MIN(preco) AS menor_preco FROM passagens WHERE cidade_destino_id = ?");
        $stmt->bind_param("s", $id_destino);
        $stmt->execute();
        $result = $stmt->get_result();
        $preco = $result->fetch_assoc();
        return $preco['menor_preco'];
    }

    private function getIdCidadePorNome($nome) {
        return $this->cidadeView->getIdCidadePorNome($nome);
    }
}

