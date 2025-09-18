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
        $erro = $this->usuarioController->cadastrarUsuario($nome, $email, $cpf, $senha);
        if (!$erro) {
            header('Location: ../auth/login.php');
            exit();
        } else {
            return $erro;
        }
    }

    function logarUsuario($email, $senha)
    {
        $erro = $this->usuarioController->logarUsuario($email, $senha);
        if (!$erro) {
            header('Location: ../index.php');
            exit();
        }
        return $erro;
    }

    function logoutUsuario()
    {
        $this->usuarioController->logoutUsuario();
        header('Location: ../index.php');
        exit();
    }
}
