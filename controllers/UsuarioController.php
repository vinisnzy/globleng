<?php

require_once __DIR__ . '/../models/UsuarioModel.php';

final class UsuarioController
{

    private UsuarioModel $usuarioModel;

    function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    function cadastrarUsuario($nome, $email, $cpf, $senha)
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
        return $this->usuarioModel->cadastrarUsuario($nome, $email, $cpf, $senha_hash);
    }

    function logarUsuario($email, $senha)
    {
        return $this->usuarioModel->logarUsuario($email, $senha);
    }

    function logoutUsuario()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_unset();
        session_destroy();
    }
}
