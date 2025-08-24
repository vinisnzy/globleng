<?php
require_once 'conexao.php';

function validar_cadastro($email, $cpf, $senha) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email inválido.";
    }
    if (strlen($senha) < 6) {
        return "A senha deve ter pelo menos 6 caracteres.";
    }
    if (!preg_match('/^[0-9]{11}$/', $cpf)) {
        return "CPF inválido.";
    }

    global $conn;

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Já existe um cadastro com esse email.";
    }

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Já existe um cadastro com esse CPF.";
    }

    $stmt->close();
    return "";
}
?>