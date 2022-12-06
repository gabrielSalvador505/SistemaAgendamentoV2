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
            <label for="name-serv">Nome</label>
            <input type="text" class="form-control" name="name-serv" id="name-serv" placeholder="nome do serviço" autocomplete="off" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="desc-serv">Descrição</label>
            <textarea type="text" class="form-control" id="desc-serv" name="desc-serv" placeholder="descrição do serviço" autocomplete="off" required></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="duracao-serv">Duração</label>
            <select class="form-control required" id="duracao-serv" name="duracao-serv" placeholder="Insira seu Email" required>
              <option value="00:30:00">00:30</option>
              <option value="01:00:00">01:00</option>
              <option value="01:30:00">01:30</option>
              <option value="02:00:00">02:00</option>
              <option value="02:30:00">02:30</option>
              <option value="03:00:00">03:00</option>
              <option value="02:30:00">03:30</option>
              <option value="04:00:00">04:30</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="valor">Valor</label>
            <input type="text" class="form-control required" id="valor" name="valor" placeholder="valor do servico" autocomplete="off" required>
          </div>
        </div>
      </div>
      <button type="submit" id="create-func-button" name="create-func" class="btn__ simple-purple-button">Criar</button>
    </form>
  </div>
  <?php
  if (isset($_POST['create-func'])) {
    $nome_serv = isset($_POST['name-serv']) ? $_POST['name-serv'] : null;
    $desc_serv = isset($_POST['desc-serv']) ? $_POST['desc-serv'] : null;
    $duracao_serv = isset($_POST['duracao-serv']) ? $_POST['duracao-serv'] : null;
    $vlr_serv = isset($_POST['valor']) ? $_POST['valor'] : null;


    $createQuery = $pdo->prepare("INSERT INTO servico (nome_serv, desc_serv, duracao_serv, vlr_serv) VALUES ('$nome_serv', '$desc_serv', '$duracao_serv', '$vlr_serv')");
    $createQuery->execute();
  }
  ?>