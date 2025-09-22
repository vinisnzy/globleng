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
        $this->validarCadastro($email, $cpf);
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
        return $this->usuarioModel->cadastrarUsuario($nome, $email, $cpf, $senha_hash);
    }

    function logarUsuario($email, $senha)
    {
        $usuario = $this->usuarioModel->logarUsuario($email, $senha);
        if (password_verify($senha, $usuario['senha'])) {
            return $usuario;
        } else {
            throw new Exception("Email ou senha incorretos.");
        }
    }

    function logoutUsuario()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_unset();
        session_destroy();
    }

    private function validarCadastro($email, $cpf)
    {
        $this->validarEmailECpf($email, $cpf);
        $this->usuarioModel->verificarEmailOuCpfExistente($email, $cpf);
    }

    private function validarEmailECpf($email, $cpf)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }
        if (!preg_match('/^[0-9]{11}$/', $cpf)) {
            throw new Exception("CPF inválido.");
        }
    }
}
