<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Cliente</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../assets/imgs/logo-globleng.png" type="image/x-icon">
</head>
<body>

<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === 'success') {
        echo '<div class="message success">Cadastro realizado com sucesso!</div>';
    } elseif ($status === 'error') {
        $mensagem = htmlspecialchars($_GET['message'] ?? 'Erro ao cadastrar.');
        echo "<div class='message error'>$mensagem</div>";
    }
}
?>


<div class="container">
    <h1>Cadastro</h1>
    <p>Já tem conta? <a href="login.php" id="logar">Logar</a></p>

    <form action="conexao.php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
        </div>

        <div class="form-group">
            <label for="senha">Crie uma Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>


        <button type="submit" class="button1">Criar</button>
    </form>
</div>

</body>
</html>
