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
    if ($_GET['status'] === 'success') {
        echo '<div class="message success">Cadastro realizado com sucesso!</div>';
    } elseif ($_GET['status'] === 'error') {
        $mensagem = htmlspecialchars($_GET['message'] ?? 'Erro ao cadastrar.');
        echo "<div class='message error'>$mensagem</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';

    if ($senha && $confirmarSenha) {
        if ($senha === $confirmarSenha) {
            echo '<div class="message success">Senha confirmada com sucesso!</div>';
        } else {
            echo '<div class="message error">As senhas não coincidem. Tente novamente.</div>';
        }
    }
}

function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += $cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ($cpf[$t] != $digito) {
            return false;
        }
    }
    return true;
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

        <div class="form-group">
            <label for="confirmar_senha">Digite a senha novamente:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme sua senha" required>
        </div>

        <button type="submit" class="button1">Criar</button>
    </form>
</div>

</body>
</html>
