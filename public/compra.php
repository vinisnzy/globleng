<?php

require_once "../views/PassagemView.php";
require_once "../views/UsuarioView.php";
require_once "../utils/formatStrings.php";

$passagemView = new PassagemView();
$usuarioView = new UsuarioView();

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    unset($_SESSION['redirect']);
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: auth/login.php");
} else {
    $usuario = $usuarioView->getUsuarioPorId($_SESSION['usuario_id']);
}

$passagem_id = $_GET['id'];
$passagem = $passagemView->getPassagemPorId($passagem_id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/imgs/logo-globleng.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="../assets/css/compra.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Pagamento da Passagem</title>
</head>
<body>
    <main>
        <div class="payment-container">
            <div class="form-etapas">
                <div id="dados-cliente" class="card form-pagamento visivel">
                    <div class="step-indicator">Etapa 1 de 2: Seus Dados</div>
                    <h2>Informações do Passageiro</h2>
                    <form id="form-cliente">
                        <div class="form-group">
                            <label for="nome-completo">Nome Completo</label>
                            <input type="text" id="nome-completo" name="nome" placeholder="Seu nome como no documento" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" id="telefone" name="telefone" placeholder="(00) 90000-0000" required>
                        </div>
                        <button type="button" id="btn-prosseguir-pagamento" class="btn-pagar">Prosseguir para Pagamento</button>
                    </form>
                </div>

                <div id="dados-pagamento" class="card form-pagamento oculto">
                    <div class="step-indicator">Etapa 2 de 2: Pagamento</div>
                    <h2>Escolha como Pagar</h2>

                    <div class="form-group">
                        <label for="payment-method-selector">Forma de Pagamento</label>
                        <select id="payment-method-selector" class="form-control">
                            <option value="cartao" selected>Cartão de Crédito</option>
                            <option value="pix">PIX</option>
                        </select>
                    </div>

                    <div id="bloco-cartao" class="payment-method-block visivel">
                        <div class="card-icons">
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-brands fa-cc-mastercard"></i>
                        </div>
                        <form action="#" method="POST" id="form-cartao">
                            <div class="form-group">
                                <label for="card-name">Nome no Cartão</label>
                                <input type="text" id="card-name" placeholder="João M. da Silva" required>
                            </div>
                            <div class="form-group">
                                <label for="card-number">Número do Cartão</label>
                                <input type="text" id="card-number" placeholder="0000 0000 0000 0000" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="card-expiry">Validade</label>
                                    <input type="text" id="card-expiry" placeholder="MM/AA" required>
                                </div>
                                <div class="form-group">
                                    <label for="card-cvc">CVV</label>
                                    <input type="text" id="card-cvc" placeholder="123" required>
                                </div>
                            </div>
                            <button type="submit" class="btn-pagar">Finalizar Pagamento</button>
                        </form>
                    </div>

                    <div id="bloco-pix" class="payment-method-block oculto">
                        <p class="pix-instructions">Escaneie o QR Code ou use a chave PIX para finalizar sua reserva.</p>
                        <div class="pix-qr-code">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <div class="pix-key-wrapper">
                            <span class="pix-key">a1b2c3d4-e5f6-7890-g1h2-i3j4k5l6m7n8</span>
                            <button type_button" class="btn-copy-pix" title="Copiar Chave">
                                <i class="fa-regular fa-copy"></i>
                            </button>
                        </div>
                        <p class="pix-expiry">O código PIX expira em <strong>15 minutos</strong>.</p>
                    </div>

                    <button type="button" id="btn-voltar" class="btn-voltar">Voltar e editar dados</button>
                </div>
            </div>

            <div class="card resumo-viagem">
                <h2>Resumo da sua Viagem</h2>
                <div class="destino-header">
                    <img src="<?= htmlspecialchars("../assets/imgs/cards/card-" . removerAcentos($passagem['cidade_destino']) . ".jpg") ?>" alt="Imagem do Destino">
                    <h3><?= htmlspecialchars($passagem['cidade_destino']) ?></h3>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-plane-departure"></i>
                    <p><strong>Origem: </strong><?= htmlspecialchars($passagem['cidade_origem']) ?></p>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-calendar-check"></i>
                    <p><strong>Check-in: </strong><?= htmlspecialchars(formatDate($passagem['check_in']))?></p>
                </div>
                 <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <p><strong>Tempo de Voo: </strong><?= htmlspecialchars(formatTime($passagem['duracao_voo'])) ?></p>
                </div>
                <hr>
                <div class="total-price">
                    <span>Total</span>
                    <strong>R$ <?= formatPrice($passagem['preco']) ?></strong>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../includes/partials/footer.php'; ?>
        <?php if (isset($_SESSION['usuario_id'])): ?>
        <script>
            const inputName = document.querySelector("#nome-completo");
            const inputEmail = document.querySelector("#email");
            const inputCPF = document.querySelector("#cpf");
            const usuario = <?= json_encode($usuario) ?>;

            function formatarCPF(cpf) {
                cpf = cpf.replace(/\D/g, ''); // remove tudo que não é número
                return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
            }

            inputName.value = usuario.nome
            inputEmail.value = usuario.email
            inputCPF.value = formatarCPF(usuario.cpf)
        </script>
    <?php endif; ?>
    <script src="../assets/js/compra.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script src="../assets/js/cpf.js"></script>
</body>
</html>