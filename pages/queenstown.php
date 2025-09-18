<?php
  require_once('../views/PassagemView.php');
  $passagemView = new PassagemView();
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
  <title>Queenstown</title>
</head>

<body>
  <main>
    <div class="video-container">
      <h1 class="video-title">Queenstown, Uma cidade<br> que vai te <br><span>surpreender!</span>
        <p>1.184 reviews</p>
      </h1>
      <video autoplay muted loop>
        <source src="../assets/videos/queenstown.mp4" type="video/mp4">
      </video>
    </div>
    <ul id="list" class="passes">
      <?php
      $passagemView->listarPassagensPorDestino('Queenstown');
      ?>
    </ul>
    <div class="btn-ver-mais-wrapper">
      <button class="btn-ver-mais">Ver mais...</button>
    </div>
    <section class="carousel-section">
      <button class="carousel-btn left">
        <i class="fa fa-chevron-left"></i>
      </button>

      <div class="carousel-container">
        <div class="carousel-track">
          <img src="../assets/imgs/carrossel/franca-carrossel.jpg" alt="Imagem 1" />
          <img src="../assets/imgs/carrossel/alemanha-carrossel.jpg" alt="Imagem 2" />
          <img src="../assets/imgs/carrossel/india-carrossel.jpg" alt="Imagem 3" />
          <img src="../assets/imgs/carrossel/brasil-carrossel.jpg" alt="Imagem 4" />
          <img src="../assets/imgs/carrossel/maldivas-carrossel.jpg" alt="Imagem 5" />
        </div>
      </div>

      <button class="carousel-btn right">
        <i class="fa fa-chevron-right"></i>
      </button>
    </section>
  </main>
  <?php include_once '../includes/partials/footer.php'; ?>
</body>
<script src="../assets/js/carousel.js"></script>
<script src="../assets/js/list.js"></script>

</html>