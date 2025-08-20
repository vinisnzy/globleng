<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "amanda"; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    header("Location: Cadastro.php?status=error&message=" . urlencode("Falha na conexão com o banco de dados: " . $conn->connect_error));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $cpf = $conn->real_escape_string($_POST['cpf']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO clientes (nome, email, cpf, senha_hash)
            VALUES ('$nome', '$email', '$cpf', '$senha')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Cadastro.php?status=success");
        exit();
    } else {
        header("Location: Cadastro.php?status=error&message=" . urlencode("Erro ao cadastrar: " . $conn->error));
        exit();
    }
}

$conn->close();
?>