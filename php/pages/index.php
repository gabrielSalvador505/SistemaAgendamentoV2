<?php
session_start();
require_once "../items/conexao.php";
$pdo = conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agendamento NailsKelly</title>
  <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script> <!-- Ícones -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Montserrat:wght@400;700&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="icon" href="../../assets/favicon.png">
  <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body>
  <?php include '../items/header.php' ?>
  <!-- Header -->
  <div id="indexContainer">
    <!-- Landing -->
    <div id="indexTop">
      <div id="show">
        <h2>Agendamento</h2>
        <h1>Espaço Kelly<br>Silvestre</h1>
        <p>Com nosso sistema<br>você pode marcar seu horário<br>em menos de cinco minutos</p>
        <a class="btn_" <?php if (isset($_SESSION['acesso'])) {?> onclick="alertFunc()" href="./index.php" <?php } if (isset($_SESSION['user'])) { ?>href="./schedulingPage.php" <?php } else { ?> href="./loginPage.php" <?php } ?>>Agendar <i class="fa-solid fa-arrow-right fa-l"></i></a>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" id="index-waves">
        <path fill="#fff" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,74.7C384,75,480,53,576,58.7C672,64,768,96,864,96C960,96,1056,64,1152,48C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </div>
  <div id="instagran-frame">
    <h1>alguns dos nossos serviços</h1>
  </div>
  <div data-mc-src="59ca4c65-d89e-4891-9e53-0012edfab51d#null" id="embed-instragram">
  </div>
  <script src="https://cdn2.woxo.tech/a.js#638272b00366c2b431284598" async data-usrc>
  </script>


  <hr id="index-line">

  <div id="local-frame">
    <h1>onde nos encontrar</h1>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.420882736537!2d-53.4629567!3d-24.951791099999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d40efa5034f7%3A0xbd8d72a090da37bd!2sR.%20Recife%2C%20570%20-%20Centro%2C%20Cascavel%20-%20PR%2C%2085810-030!5e0!3m2!1spt-BR!2sbr!4v1669496078072!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <?php include '../items/footer.php' ?>
  <!-- Footer -->

  <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
  <script src="../../js/poopper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/validation.js"></script>
</body>

</html>