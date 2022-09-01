<?php
session_start();
require_once "./php/conexao.php";
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

  <link rel="stylesheet" href="css/main.css"> <!-- Custom CSS -->
</head>
<body>
  <div id="header"> <!-- Header -->
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    LOGO
                </a>
                <div class="justify-content-end nav-buttons">
                    <button class="btn_ btn-1 button-mobile" data-toggle="modal" data-target="#loginModal">entrar</button>
                </div>
                </button>
                <div class="collapse navbar-collapse flex-column" id="navbarNavAlt">
                    <ul class="navbar nav flex-none">
                      <li class="nav-item"><a href="#content-3" class="nav-link active">Nossa Equipe</a></li>
                      <li class="nav-item"><a href="#content-2" class="nav-link active">Serviços</a></li>
                      <li class="nav-item"><a href="#content-4" class="nav-link active">Localização</a></li>
                        <li class="nav-item"><a href="#footer" class="nav-link active">Contato</a></li>
                    </ul>
                </div>
                <button class="btn_ button-desktop" data-toggle="modal" data-target="#loginModal">entrar</button>
            </nav>
        </div>
    </div>
    <div id="content-1"> <!-- Landing -->
        <img src="assets/girlpose2.png" id="girl">
        <div id="description">
            <img src="assets/clock.png" id="clock">
            <img src="assets/day.png" id="day">
            <h2>Agendamento</h2>
            <h1>Espaço Kelly Silvestre</h1>
            <p>Para economizar o seu tempo e descomplicar o agendamento utilize nosso sistema, em <span class="underline">menos de 5 minutos</span> o agendamento é finalizado.</p>
            <div class="go-to">
                <a href="#">Agendar</a> <i class="fa-solid fa-arrow-right fa-xl"></i>
            </div>
        </div>
    </div>

    <?php include './php/ourTeam.php'?>  <!-- Equipe-->

    <?php include './php/ourServices.php'?> <!-- Serviços -->

    <?php include './php/ourLocate.php'?> <!-- Localização -->

    <div id="content-5"> <!-- Remember -->
        <div id="remember">
            <h1>Faça já seu agendamento</h1>
            <p>em menos de 5 minutos</p>
            <button>Vamos lá!</button>
        </div>
    </div>

    <?php include './php/footer.php'?> <!-- Footer -->

    <?php include './php/modalLogin.php'?> <!-- Modal login--> 
    
    <?php include './php/modalCadastro.php'?> <!-- Modal cadastro -->

    <script src="js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
    <script src="js/poopper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="./js/validation.js"></script>

</body>
</html>