<?php
$conn = new mysqli("localhost", "root", "", "globleng_db");

if ($conn->connect_error) {
    echo "Erro na conexão: " . $conn->connect_error;
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");

    if ($stmt === false) {
        echo "Erro na preparação da query: " . $conn->error;
        exit();
    }

    // "ssss" = 4 strings
    $stmt->bind_param("ssss", $nome, $email, $cpf, $senha_hash);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>