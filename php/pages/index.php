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
  <title>SistemaAgendamento</title>
  <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script> <!-- Ícones -->

  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body>
  <?php include '../items/header.php' ?>
  <!-- Header -->
  <div id="indexContainer">
    <!-- Landing -->
    <div id="indexTop"></div>
    <div id="show">
      <h2>Agendamento</h2>
      <h1>Espaço Kelly<br>Silvestre</h1>
      <p>Com nosso sistema<br>você pode marcar seu horário<br>em menos de cinco minutos</p>
      <a class="btn_" <?php if (isset($_SESSION['user'])) { ?>href="./schedulingPage.php" <?php } else { ?> href="./loginPage.php" <?php } ?>>Agendar <i class="fa-solid fa-arrow-right fa-l"></i></a>
    </div>
  </div>

  <?php include '../items/footer.php' ?>
  <!-- Footer -->

  <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
  <script src="../../js/poopper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/validation.js"></script>
</body>

</html>