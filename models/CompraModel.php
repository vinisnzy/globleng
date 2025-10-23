<?php

require_once __DIR__ . '/../config/Database.php';
require_once 'UsuarioModel.php';
final class CompraModel {

    private $connection;
    private $usuarioModel;

    function __construct() {
        $database = new Database();
        $this->connection = $database->connection;
        $this->usuarioModel = new UsuarioModel();
    }

    function inserirCompra($id_usuario, $id_passagem, $telefone)
    {
        $stmt = $this->connection->prepare("UPDATE usuarios SET telefone = ? WHERE id = ?");
        $stmt->bind_param("si", $telefone, $id_usuario);
        $stmt->execute();
        $stmt->close();

        $stmt = $this->connection->prepare("INSERT INTO compras (usuario_id, passagem_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_usuario, $id_passagem);
        $stmt->execute();
        $stmt->close();
    }
}
?>