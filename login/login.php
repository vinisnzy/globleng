<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>

<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo '<div class="message success">Cadastro realizado com sucesso!</div>';
    } elseif ($_GET['status'] === 'error') {
        $mensagem = htmlspecialchars($_GET['message'] ?? 'Erro ao cadastrar.');
        echo "<div class='message error'>Erro ao cadastrar: $mensagem</div>";
    }
}
?>

<div class="container">
    <h1>Login</h1>
    <p>Não tem conta? <a href="cadastro.php" id="logar">Cadastrar</a></p>

    <form action="#" method="post">
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="form-group">
            <label for="senha">Digite sua Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>

        <p><a href="#">Esqueci minha senha</a></p>
        <button type="submit" class="button1">Entrar</button>
    </form>
</div>

</body>
</html>

