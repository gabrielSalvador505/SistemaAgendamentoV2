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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Montserrat:wght@400;700&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="icon" href="../../assets/favicon.png">
  <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body>
  <?php include '../items/header.php' ?>
  <?php include '../items/headerAdmin.php' ?>

  <div id="modal-create-func">
    <div id="modal-header">
      <h1>Adicionar Servico</h1>
      <hr>
    </div>
    <form method="post">
    <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="ini">Inicio Jornada</label>
            <select class="form-control required" id="ini" name="ini" required>
            <?php
              $data = new DateTime('01/01/2000 00:00');
              $horaFormatada = $data->format('H:i');
              $dia = $data->format('d');
              while ($dia == '1') {
                echo "<option value='" . $horaFormatada . "'> ". $horaFormatada . "</option>";
                $data->modify('+30 minute');
                $horaFormatada = $data->format('H:i');
                $dia = $data->format('d');
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="ini-pausa">Pausa</label>
            <select class="form-control required" id="ini-pausa" name="ini-pausa" required>
            <?php
              $data = new DateTime('01/01/2000 00:00');
              $horaFormatada = $data->format('H:i');
              $dia = $data->format('d');
              while ($dia == '1') {
                echo "<option value='" . $horaFormatada . "'> ". $horaFormatada . "</option>";
                $data->modify('+30 minute');
                $horaFormatada = $data->format('H:i');
                $dia = $data->format('d');
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="fim-pausa">Fim da Pausa</label>
            <select class="form-control required" id="fim-pausa" name="fim-pausa" required>
            <?php
              $data = new DateTime('01/01/2000 00:00');
              $horaFormatada = $data->format('H:i');
              $dia = $data->format('d');
              while ($dia == '1') {
                echo "<option value='" . $horaFormatada . "'> ". $horaFormatada . "</option>";
                $data->modify('+30 minute');
                $horaFormatada = $data->format('H:i');
                $dia = $data->format('d');
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="fim">Fim Jornada</label>
            <select class="form-control required" id="fim" name="fim" required>
            <?php
              $data = new DateTime('01/01/2000 00:00');
              $horaFormatada = $data->format('H:i');
              $dia = $data->format('d');
              while ($dia == '1') {
                echo "<option value='" . $horaFormatada . "'> ". $horaFormatada . "</option>";
                $data->modify('+30 minute');
                $horaFormatada = $data->format('H:i');
                $dia = $data->format('d');
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <button type="submit" id="create-func-button" name="create-jorn" class="btn__ simple-purple-button">Criar</button>
    </form>
  </div>
  <?php
  if (isset($_POST['create-jorn'])) {
    $ini = isset($_POST['ini']) ? $_POST['ini'] : null;
    $ini_pausa = isset($_POST['ini-pausa']) ? $_POST['ini-pausa'] : null;
    $fim_pausa = isset($_POST['fim-pausa']) ? $_POST['fim-pausa'] : null;
    $fim = isset($_POST['fim']) ? $_POST['fim'] : null;


    $createQuery = $pdo->prepare("INSERT INTO jornada (ini_jorn, ini_pausa_jorn, fim_pausa_jorn, fim_jorn) VALUES ('$ini', '$ini_pausa', '$fim_pausa', '$fim')");
    $createQuery->execute();
  }
  ?>

