<?php
require_once 'views/UsuarioView.php';
include_once 'views/PassagemView.php';

$usuarioView = new UsuarioView();
$passagemView = new PassagemView();

if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/imgs/logo-globleng.png" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/search.css">
  <link rel="stylesheet" href="assets/css/carousel.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <title>Globleng</title>
</head>

<body>
  <header>
    <div class="up">
      <div class="logo">
        <img src="./assets/imgs/logo-globleng.png" alt="Logo" />
        <h1>Globleng</h1>
      </div>
      <nav>
        <a href="#search" class="link-search"><i class="fa fa-search"></i></a>

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
      <h2>Descubra o mundo, Dessas <span>maravilhas</span> ocultas!</h2>
    </div>
  </header>
  <main>
    <div id="search" class="search">
      <div class="search-container">
        <div class="search-top">
          <i class="fa fa-search"></i>
          <input type="text" placeholder="Qual seu próximo destino?" />
        </div>

        <div class="search-bottom">
          <div class="search-field">
            <i class="fa fa-calendar"></i>
            <input
              id="date-input"
              type="text"
              placeholder="check-in/out"
              maxlength="23" />
          </div>

          <div class="divider"></div>

          <div class="search-field">
            <i class="fa fa-user"></i>
            <input
              id="guests-input"
              type="text"
              placeholder="qntd. passageiros" />
          </div>
        </div>
      </div>
    </div>
    <section id="list" class="destinos-globleng">
      <div class="card-globleng">
        <img src="./assets/imgs/cards/card-toronto.jpg" alt="Toronto" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong> R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Toronto')) ?></strong></div>
          <a href="pages/toronto.php">
            <div class="card-vermais">Ver mais</div>  
          </a>
        </div>
        <div class="card-info">
          <h3>Toronto</h3>
          <p>Cidade do Canadá</p>
          <div class="card-avaliacao">⭐ 4.8 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng">
        <img src="./assets/imgs/cards/card-toquio.jpg" alt="Tóquio" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Tóquio')) ?></strong></div>
          <a href="pages/toquio.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Tóquio</h3>
          <p>Capital do Japão</p>
          <div class="card-avaliacao">⭐ 4.9 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng">
        <img src="./assets/imgs/cards/card-zermatt.jpg" alt="Zermatt" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Zermatt')) ?></strong></div>
          <a href="pages/zermatt.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Zermatt</h3>
          <p>Cidade da Suíça</p>
          <div class="card-avaliacao">⭐ 4.5 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng">
        <img src="./assets/imgs/cards/card-bariloche.jpg" alt="Bariloche" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Bariloche')) ?></strong></div>
          <a href="pages/bariloche.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Bariloche</h3>
          <p>Cidade da Argentina</p>
          <div class="card-avaliacao">⭐ 5.0 <i class="fa fa-plus"></i></div>
        </div>
      </div>
      <div class="card-globleng oculto">
        <img src="./assets/imgs/cards/card-londres.jpg" alt="Londres" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Londres')) ?></strong></div>
          <a href="pages/londres.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Londres</h3>
          <p>Capital do Reino Unido</p>
          <div class="card-avaliacao">⭐ 4.6 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng oculto">
        <img
          src="./assets/imgs/cards/card-cidade-do-cabo.jpg"
          alt="Cidade do Cabo" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong><?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Cidade do Cabo')) ?></strong></div>
          <a href="pages/cidade-do-cabo.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Cidade do Cabo</h3>
          <p>África do Sul</p>
          <div class="card-avaliacao">⭐ 4.7 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng oculto">
        <img src="./assets/imgs/cards/card-dubai.jpg" alt="Dubai" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Dubai')) ?></strong></div>
          <a href="pages/dubai.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Dubai</h3>
          <p>Emirados Árabes Unidos</p>
          <div class="card-avaliacao">⭐ 4.9 <i class="fa fa-plus"></i></div>
        </div>
      </div>

      <div class="card-globleng oculto">
        <img src="./assets/imgs/cards/card-queenstown.jpg" alt="Queenstown" />
        <div class="card-overlay">
          <div class="card-preco">A partir de <strong>R$ <?php echo htmlspecialchars($passagemView->menorPrecoPorDestino('Queenstown')) ?></strong></div>
          <a href="pages/queenstown.php">
            <div class="card-vermais">Ver mais</div>
          </a>
        </div>
        <div class="card-info">
          <h3>Queenstown</h3>
          <p>Nova Zelândia</p>
          <div class="card-avaliacao">⭐ 4.8 <i class="fa fa-plus"></i></div>
        </div>
      </div>
    </section>
    <div class="btn-ver-mais-wrapper">
      <button class="btn-ver-mais">Ver mais...</button>
    </div>
    <section class="carousel-section">
      <button class="carousel-btn left">
        <i class="fa fa-chevron-left"></i>
      </button>

      <div class="carousel-container">
        <div class="carousel-track">
          <img src="./assets/imgs/carrossel/franca-carrossel.jpg" alt="Imagem 1" />
          <img src="./assets/imgs/carrossel/alemanha-carrossel.jpg" alt="Imagem 2" />
          <img src="./assets/imgs/carrossel/india-carrossel.jpg" alt="Imagem 3" />
          <img src="./assets/imgs/carrossel/brasil-carrossel.jpg" alt="Imagem 4" />
          <img src="./assets/imgs/carrossel/maldivas-carrossel.jpg" alt="Imagem 5" />
        </div>
      </div>

      <button class="carousel-btn right">
        <i class="fa fa-chevron-right"></i>
      </button>
    </section>
  </main>
  <?php include_once 'includes/partials/footer.php'; ?>
</body>
<script src="assets/js/index.js"></script>
<script src="assets/js/carousel.js"></script>
<script src="assets/js/list.js"></script>

</html>