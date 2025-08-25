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
  <title>Tóquio</title>
</head>

<body>
  <main>
    <div class="video-container">
      <h1 class="video-title">Tóquio, Uma cidade<br> que vai te <br><span>surpreender!</span>
        <p>12.184 reviews</p>
      </h1>
      <video autoplay muted loop>
        <source src="../assets/videos/toquio.mp4" type="video/mp4">
      </video>
    </div>
    <ul id="list" class="passes">
      <li class="pass">
        <i class="fa-solid fa-plane"></i>
        <div class="pass-info">
          <p>18:30 — 2 conexões - 18:30</p>
          <p>36h00 de vôo</p>
        </div>
        <p class="pass-price"><span class="fi fi-br"></span>R$ 6.254</p>
      </li>
      <li class="pass">
        <i class="fa-solid fa-plane"></i>
        <div class="pass-info">
          <p>10:20 — 1 conexão - 17:00</p>
          <p>07h20 de vôo</p>
        </div>
        <p class="pass-price"><span class="fi fi-br"></span>R$ 3.551</p>
      </li>
      <li class="pass">
        <i class="fa-solid fa-plane"></i>
        <div class="pass-info">
          <p>11:00 — 1 conexão - 14:00</p>
          <p>03h00 de vôo</p>
        </div>
        <p class="pass-price"><span class="fi fi-br"></span>R$ 2.845</p>
      </li>
      <li class="pass oculto">
        <i class="fa-solid fa-plane"></i>
        <div class="pass-info">
          <p>09:00 — 1 conexão - 18:00</p>
          <p>09h00 de vôo</p>
        </div>
        <p class="pass-price"><span class="fi fi-br"></span>R$ 4.321</p>
      </li>
      <li class="pass oculto">
        <i class="fa-solid fa-plane"></i>
        <div class="pass-info">
          <p>17:00 - 1 conexão - 21:00</p>
          <p>04h00 de vôo</p>
        </div>
        <p class="pass-price"><span class="fi fi-br"></span>R$ 1.556</p>
      </li>
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
  <footer class="globleng-footer">
    <div class="footer-left">
      <p>©2025 <strong>Globleng</strong></p>
    </div>

    <div class="footer-center">
      <img src="../assets/imgs/logo-footer.png" alt="Palmeira" />
    </div>

    <div class="footer-right">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </footer>
</body>
<script src="../components/carousel.js"></script>
<script src="../components/list.js"></script>

</html>