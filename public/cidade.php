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
  <link rel="stylesheet" href="../assets/css/modal.css">
  <link rel="stylesheet" href="../assets/css/carousel.css">
  <link rel="stylesheet" href="../assets/css/avaliacao.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
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
    </ul>
    <div class="btn-ver-mais-wrapper">
      <button class="btn-ver-mais">Ver mais...</button>
    </div>

    <div id="flightModal" class="modal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <img id="modal-image" src="<?php echo htmlspecialchars("../assets/imgs/cards/card-" . $nome_cidade_sem_acentos . ".jpg") ?>" alt="Imagem do Destino" class="modal-image">
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
    <?php $cidadeView->exibirCarrosselPorCidade($nome_cidade_sem_acentos)?>
    <div class="reviews-container">
    <section class="reviews-section">
        <h2>O que os viajantes dizem sobre <span><?php echo htmlspecialchars(ucfirst($nome_cidade))?></span></h2>
        
        <div class="reviews-list">
            <div class="review-card">
                <div class="review-header">
                    <span class="review-author">Carla Montenegro</span>
                    <div class="review-rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                    </div>
                </div>
                <p class="review-text">"Simplesmente inesquecível! A arquitetura é de tirar o fôlego e a comida é divina. Recomendo 100%!"</p>
                <span class="review-date">Postado em 09 de Outubro de 2025</span>
            </div>

            <div class="review-card">
                <div class="review-header">
                    <span class="review-author">Rafael Borges</span>
                    <div class="review-rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9734;</span>
                    </div>
                </div>
                <p class="review-text">"Ótima cidade para passear. O transporte público poderia ser um pouco melhor, mas os pontos turísticos compensam."</p>
                <span class="review-date">Postado em 07 de Outubro de 2025</span>
            </div>
        </div>
    </section>

    <section class="review-form-section">
        <h3>Deixe sua Avaliação</h3>
        <form id="review-form" class="review-form">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" required placeholder="Ex: João Silva">
            </div>
            <div class="form-group">
                <label>Nota</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" required/><label for="star5" title="5 estrelas">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 estrelas">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 estrelas">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 estrelas">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 estrela">&#9733;</label>
                </div>
            </div>
            <div class="form-group">
                <label for="review">Comentário</label>
                <textarea id="review" name="review" rows="5" required placeholder="Escreva aqui o que você achou da cidade..."></textarea>
            </div>
            <button type="submit" class="submit-btn">Enviar Avaliação</button>
        </form>
    </section>
</div>
  </main>
  <?php include_once '../includes/partials/footer.php'; ?>
</body>
<script src="../assets/js/carousel.js"></script>
<script src="../assets/js/list.js"></script>
<script src="../assets/js/modal.js"></script>

</html>