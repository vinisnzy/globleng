<?php
require_once '../views/PassagemView.php';
require_once '../views/CidadeView.php';
$passagemView = new PassagemView();
$cidadeView = new CidadeView();

$nome_cidade = $_GET['nome'];

// Remover acentos
$nome_cidade_sem_acentos = iconv('UTF-8', 'ASCII//TRANSLIT', $nome_cidade);
$nome_cidade_sem_acentos = preg_replace('/[^A-Za-z0-9\s\-]/', '', $nome_cidade_sem_acentos);

$url_video = "../assets/videos/" . $nome_cidade_sem_acentos . ".mp4";

if (str_contains($nome_cidade, "-")) {
  $nome_cidade = str_replace("-", " ", $nome_cidade);
}

$reviews = $cidadeView->getReviewsPorCidade(ucfirst($nome_cidade));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/imgs/logo-globleng.png" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />
  <link rel="stylesheet" href="../assets/css/cidade.css">
  <link rel="stylesheet" href="../assets/css/carousel.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <link rel="stylesheet" href="../assets/css/modal.css">
  <title><?php echo htmlspecialchars(ucfirst($nome_cidade)) ?></title>
</head>

<body>
  <main>
    <div class="video-container">
      <h1 class="video-title"><?php echo htmlspecialchars(ucfirst($nome_cidade)) ?>, Uma cidade<br> que vai te <br><span>surpreender!</span>
        <p><?php echo htmlspecialchars($reviews) ?> reviews</p>
      </h1>
      <video autoplay muted loop>
        <source src="<?php echo htmlspecialchars($url_video) ?>" type="video/mp4">
      </video>
    </div>
    <ul id="list" class="passes">
      <?php
      $passagemView->listarPassagensPorDestino(ucfirst($nome_cidade));
      ?>
      <div id="modal-detalhes" class="modal">
        <span class="close-button">&times;</span>
        <div class="modal-content">
            <div class="modal-image"></div>
            
            <div class="modal-details">
                <h2 id="modal-destino-titulo"></h2>
                <p id="modal-descricao" class="descricao-texto"></p>
                
                <div class="modal-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                  <span id="modal-rota"></span>
                </div>

                <div class="modal-preco-wrapper">
                    <span>a partir de</span>
                    <p id="modal-preco"></p>
                </div>

                <div class="modal-actions">
                    <button class="btn-principal">COMPRAR</button>
                    <a href="#" class="btn-secundario">VER MAIS OPÇÕES</a>
                </div>
            </div>
        </div>
    </div>
    </ul>
    <div class="btn-ver-mais-wrapper">
      <button class="btn-ver-mais">Ver mais...</button>
    </div>
    <?php $cidadeView->exibirCarrosselPorCidade($nome_cidade_sem_acentos)?>
  </main>
  <?php include_once '../includes/partials/footer.php'; ?>
</body>
<script src="../assets/js/carousel.js"></script>
<script src="../assets/js/list.js"></script>
<script src="../assets/js/modal.js"></script>

</html>