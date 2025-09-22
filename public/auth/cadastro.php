<?php
require_once '../../views/UsuarioView.php';

$usuarioView = new UsuarioView();

$erro = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    if ($nome && $email && $cpf && $senha) {
        $erro = $usuarioView->cadastrarUsuario($nome, $email, $cpf, $senha);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../assets/css/cadastro.css" />
    <link rel="shortcut icon" href="../../assets/imgs/logo-globleng.png" type="image/x-icon" />
</head>

<body>
    <div class="container">
        <h1>Cadastro</h1>
        <p>Já tem conta? <a href="./login.php" id="logar">Logar</a></p>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Digite seu email" required />
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required />
            </div>
            <div class="form-group">
                <label for="senha">Crie uma Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required />
            </div>
            <button type="submit">Criar</button>
        </form>
        <?php if ($erro): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
<script>
    document.getElementById('cpf').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = value;
    });
</script>

</html>