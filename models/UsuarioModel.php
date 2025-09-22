<?php

require_once __DIR__ . '/../config/Database.php';

final class UsuarioModel
{
    private $connection;

    function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection;
    }

    function cadastrarUsuario($nome, $email, $cpf, $senha_hash)
    {
        $this->validarCadastro($email, $cpf);
        $stmt = $this->connection->prepare("INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $nome, $email, $cpf, $senha_hash);

        if ($stmt === false) {
            throw new Exception("Erro na preparação da query: " . $this->connection->error);
        }

        if (!$stmt->execute()) {
            throw new Exception("Erro ao cadastrar: " . $stmt->error);
        }
        $stmt->close();
    }

    function logarUsuario($email, $senha)
    {
        $stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                return $usuario;
            } else {
                throw new Exception("Email ou senha incorretos.");
            }
        } else {
            throw new Exception("Email ou senha incorretos.");
        }

        $stmt->close();
    }

    private function validarCadastro($email, $cpf)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }
        if (!preg_match('/^[0-9]{11}$/', $cpf)) {
            throw new Exception("CPF inválido.");
        }

        $stmt = $this->connection->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            throw new Exception("Já existe um cadastro com esse email.");
        }

        $stmt = $this->connection->prepare("SELECT id FROM usuarios WHERE cpf = ?");
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            throw new Exception("Já existe um cadastro com esse CPF.");
        }

        $stmt->close();
    }
}
