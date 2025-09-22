<?php
require_once '../../views/UsuarioView.php';

$erro = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioView = new UsuarioView();
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    
    if ($email && $senha) {
        $erro = $usuarioView->logarUsuario($email, $senha);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/cadastro.css">
    <link rel="shortcut icon" href="../../assets/imgs/logo-globleng.png" type="image/x-icon" />
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