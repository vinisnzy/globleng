<?php
require_once '../views/PassagemView.php';
require_once '../utils/formatStrings.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Método não permitido");
}

$destino = $_POST['destino'];
$check_in = $_POST['check-in'];
$check_out = $_POST['check-out'];

$passagemView = new PassagemView();
$passagens = $passagemView->getPassagensPorPesquisa($destino, $check_in, $check_out);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/pesquisa.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="shortcut icon" href="../assets/imgs/logo-globleng.png" type="image/x-icon">
    <title>Pesquisa de Passagens</title>
</head>
<body>
    <header>
    <div class="up">
      <div class="logo">
        <img src="../assets/imgs/logo-globleng.png" alt="Logo" />
        <h1>Globleng</h1>
      </div>
      <nav>
        <a href="index.php#search" class="link-search"><i class="fa fa-search"></i></a>

        <?php if (isset($_SESSION['usuario_id'])): ?>
          <div class="welcome-container">
            <p>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']) ?>!</p>
            <a href="./auth/logout.php"><button class="logout-button">Sair</button></a>
          </div>
        <?php else: ?>
          <a href="./auth/login.php"><button class="login-button">Login</button></a>
        <?php endif; ?>
      </nav>
    </div>
    <div class="down">
        <h2>Resultados para <span>"<?= htmlspecialchars($destino) ?>"</span></h2>
        <p>Passagens encontradas ordenadas por relevância para sua melhor experiência.</p>
    </div>
  </header>

    <main>
            <?php if (empty($passagens)): ?>
                <div class="none-pass-content">
                    <h2 class="none-pass-text">Ops... Não encontramos a sua passagem, estamos trabalhando nisso!</h2>
                    <a class="return-to-index-button" href="index.php">Voltar ao início</a>
                </div>
            <?php endif; ?>
            <div class="destinos-globleng">
            <?php foreach ($passagens as $passagem): ?>
            <article class="card-globleng">
                <a href="#"
                class="open-modal"
                data-origem="<?php echo htmlspecialchars($passagem['origem']) ?>"
                data-destino="<?php echo htmlspecialchars($passagem['destino']) ?>"
                data-checkin="<?= htmlspecialchars(formatDate($passagem['check_in'])) ?>"
                data-checkout="<?= htmlspecialchars(formatDate($passagem['check_out'])) ?>"
                data-duracao="<?= htmlspecialchars(formatTime($passagem['duracao_voo'])) ?>"
                data-preco="<?= htmlspecialchars(formatPrice($passagem['preco'])) ?>"
                data-url-compra="<?= htmlspecialchars("compra.php?id=" . $passagem['id']) ?>"
                > 
                    <img src="../assets/imgs/cards/card-<?= htmlspecialchars(removerAcentos($passagem['destino'])) ?>.jpg" alt="<?= htmlspecialchars($passagem['destino']) ?>"> 
                    <div class="card-overlay">
                        <div class="card-preco">R$ <?= htmlspecialchars(formatPrice($passagem['preco'])) ?></div> <span class="card-vermais">Ver mais</span>
                    </div>
                </a>
                <div class="card-info">
                    <h3><?= htmlspecialchars($passagem['destino']) ?></h3>
                    <p class="card-origem">Saindo de: <strong><?php echo htmlspecialchars($passagem['origem']) ?></strong></p>
                    <p><?= htmlspecialchars(formatDate($passagem['check_in'])) ?> - <?php echo htmlspecialchars(formatDate($passagem['check_out'])) ?></p> 
                    <div class="card-avaliacao">
                        <span>R$ <?= htmlspecialchars(formatPrice($passagem['preco'])) ?></span> 
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <div id="flightModal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <img id="modal-image" src="<?= htmlspecialchars("../assets/imgs/cards/card-" . removerAcentos($destino) . ".jpg") ?>" alt="Imagem do Destino" class="modal-image">
                <div class="modal-info">
                    <h2 id="modal-destino"></h2>
                    <p id="modal-origem" class="modal-origem"></p>
                <div class="info-item">
                    <i class="fa-solid fa-plane-departure"></i>
                    <p><strong>Check-in:</strong> <span id="modal-checkin"></span></p>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-plane-arrival"></i>
                    <p><strong>Checkout:</strong> <span id="modal-checkout"></span></p>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <p><strong>Tempo de Voo:</strong> <span id="modal-duracao"></span></p>
                </div>
                <a href="#" id="modal-buy-button" class="buy-button">Comprar Passagem</a>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../includes/partials/footer.php'; ?>
</body>
<script src="../assets/js/modal.js"></script>
</html>