<?php
require_once 'conexao.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            echo "Login bem-sucedido!";

            if (!isset($_SESSION)) {
                session_start();
            }

            $primeiro_nome = explode(" ", $usuario['nome'])[0];
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $primeiro_nome;

            header("Location: ../index.php");
            exit();
        } else {
            $erro = "Email ou senha incorretos.";
        }
    } else {
        $erro = "Email ou senha incorretos.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link
        rel="shortcut icon"
        href="../assets/imgs/logo-globleng.png"
        type="image/x-icon" />
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <p>Não tem conta? <a href="./cadastro.php" id="logar">Cadastrar</a></p>

        <form action="" method="POST">
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="senha">Digite sua Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <p><a href="#">Esqueci minha senha</a></p>
            <button type="submit">Entrar</button>
        </form>

        <?php if ($erro): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>