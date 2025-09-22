<?php

require_once __DIR__ . '/../controllers/UsuarioController.php';

final class UsuarioView
{

    private UsuarioController $usuarioController;

    function __construct()
    {
        $this->usuarioController = new UsuarioController();
    }

    function cadastrarUsuario($nome, $email, $cpf, $senha)
    {
        try {
            $this->usuarioController->cadastrarUsuario($nome, $email, $cpf, $senha);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        header('Location: ../auth/login.php');
        exit();
    }

    function logarUsuario($email, $senha)
    {
        try {
            $usuario = $this->usuarioController->logarUsuario($email, $senha);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $primeiro_nome = explode(" ", $usuario['nome'])[0];
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $primeiro_nome;
        header('Location: ../index.php');
        exit();
    }

    function logoutUsuario()
    {
        $this->usuarioController->logoutUsuario();
        header('Location: ../index.php');
        exit();
    }
}
