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
        $erro = $this->validarCadastro($email, $cpf);
        $stmt = $this->connection->prepare("INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $nome, $email, $cpf, $senha_hash);

        if ($stmt === false) {
            throw new Exception("Erro na preparação da query: " . $this->connection->error);
        }

        if (!$erro) {
            if (!$stmt->execute()) {
                throw new Exception("Erro ao cadastrar: " . $stmt->error);
            }
        }

        $stmt->close();
        return $erro;
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
                $primeiro_nome = explode(" ", $usuario['nome'])[0];
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $primeiro_nome;
            } else {
                return "Email ou senha incorretos.";
            }
        } else {
            return "Email ou senha incorretos.";
        }

        $stmt->close();
    }

    function validarCadastro($email, $cpf)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email inválido.";
        }
        if (!preg_match('/^[0-9]{11}$/', $cpf)) {
            return "CPF inválido.";
        }

        $stmt = $this->connection->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return "Já existe um cadastro com esse email.";
        }

        $stmt = $this->connection->prepare("SELECT id FROM usuarios WHERE cpf = ?");
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return "Já existe um cadastro com esse CPF.";
        }

        $stmt->close();
        return "";
    }
}
