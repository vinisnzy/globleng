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
    <?php $cidadeView->exibirCarrosselPorCidade($nome_cidade_sem_acentos)?>
  </main>
  <?php include_once '../includes/partials/footer.php'; ?>
</body>
<script src="../assets/js/carousel.js"></script>
<script src="../assets/js/list.js"></script>

</html>