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

    function getPassagemPorId($id)
    {
        $stmt = $this->connection->prepare("SELECT p.duracao_voo, p.check_in, p.check_out, p.preco, origem.nome AS cidade_origem, destino.nome AS cidade_destino FROM passagens p LEFT JOIN cidades origem ON p.cidade_origem_id = origem.id LEFT JOIN cidades destino ON p.cidade_destino_id = destino.id WHERE p.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    function getPassagensPorPesquisa($destino, $check_in, $check_out)
    {
        $check_in = explode("/", $check_in);
        $check_out = explode("/", $check_out);

        $check_in = $check_in[2] . "-" . $check_in[1] . "-" . $check_in[0];
        $check_out = $check_out[2] . "-" . $check_out[1] . "-" . $check_out[0];

        $stmt = $this->connection->prepare("SELECT 
                p.id,
                destino.nome AS destino,
                origem.nome AS origem,
                p.check_in,
                p.check_out,
                p.duracao_voo,
                p.preco,
                (
                    (CASE WHEN DATE(p.check_in) = DATE(?) THEN 1 ELSE 0 END) * 2 +
                    (CASE WHEN DATE(p.check_out) = DATE(?) THEN 1 ELSE 0 END) * 2
                ) AS score
            FROM passagens p
            LEFT JOIN cidades destino 
                ON p.cidade_destino_id = destino.id
            LEFT JOIN cidades origem 
                ON p.cidade_origem_id = origem.id
            WHERE destino.nome LIKE CONCAT('%', ?, '%')
            ORDER BY score DESC, p.preco ASC
            LIMIT 10;
            ");
        $stmt->bind_param("sss", $check_in, $check_out, $destino);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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

