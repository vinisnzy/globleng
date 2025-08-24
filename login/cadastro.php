<?php
require_once 'conexao.php';
require_once 'validacao_cadastro.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = preg_replace('/\D/', '', $_POST['cpf']);
  $senha = $_POST['senha'];


  $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");

  if ($stmt === false) {
    echo "Erro na preparação da query: " . $conn->error;
    exit();
  }

  $erro = validar_cadastro($email, $cpf, $senha);

  // "ssss" = 4 strings
  $stmt->bind_param("ssss", $nome, $email, $cpf, $senha_hash);

  if (!$erro) {
    if ($stmt->execute()) {
      header("Location: login.php");
      exit();
    } else {
      echo "Erro ao cadastrar: " . $stmt->error;
    }
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro do Cliente</title>
  <link rel="stylesheet" href="../assets/css/cadastro.css" />
  <link
    rel="shortcut icon"
    href="../assets/imgs/logo-globleng.png"
    type="image/x-icon" />
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
  document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = value;
  });
</script>
</html>