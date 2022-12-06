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
  <?php
  $jornadaQuery = $pdo->prepare("SELECT * FROM jornada;");
  $jornadaQuery->execute();
  $jornadas = $jornadaQuery->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php include '../items/header.php' ?>
  <?php include '../items/headerAdmin.php' ?>

  <div id="modal-create-func">
    <div id="modal-header">
      <h1>Adicionar Funcionário</h1>
      <hr>
    </div>
    <form method="post">
      <div class="row">
        <div class="col">
          <div class="form-group mx-0">
            <label for="name-func">Nome</label>
            <input type="text" class="form-control" name="name-func" id="name-func" placeholder="nome do funcionário" autocomplete="off" required>
          </div>
        </div>
        <div class="col">
          <div class="form-group mx-0">
            <label for="data-nasc">Data de Nascimento</label>
            <input type="date" class="form-control" id="date-nasc" name="date-nasc" autocomplete="off" required>
          </div>

        </div>

      </div>
      <div class="row">
        <div class="col">
          <div class="form-group mx-0">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control required" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" autocomplete="off" maxlength="15" onkeyup="atualizarTelefone(event)" required onchange="phoneValidate()">
          </div>
        </div>
        <div class="col">
          <div class="form-group mx-0">
            <label for="endereco-func">Endereço</label>
            <input type="text" class="form-control" id="endereco-func" name="endereco-func" placeholder="Rua e número de sua casa" autocomplete="off" required />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="email-func">Email</label>
            <input type="email" class="form-control required" id="email-func" name="email-func" placeholder="Insira seu Email" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="pass">Senha</label>
            <input type="password" class="form-control required" id="pass-func" name="pass-func" placeholder="Crie uma senha" autocomplete="off" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group mx-0">
            <label for="jornada">Jornada</label>
            <select name="jornada" id="jornada" class="form-control required">
              <?php foreach ($jornadas as $vetor) {
                echo "<option value='". $vetor['cod_jorn'] .  "'>" . $vetor['cod_jorn'] . "</option>";
              } ?>
            </select>
          </div>
        </div>
      </div>
      <button type="submit" id="create-func-button" name="create-func" class="btn__ simple-purple-button">Criar</button>
    </form>
  </div>
  <?php
  if (isset($_POST['create-func'])) {
    $nome_func = isset($_POST['name-func']) ? $_POST['name-func'] : null;
    $tel_func = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    $endereco_func = isset($_POST['endereco-func']) ? $_POST['endereco-func'] : null;
    $dt_nasc_func = isset($_POST['date-nasc']) ? $_POST['date-nasc'] : null;
    $senha_func = isset($_POST['pass-func']) ? $_POST['pass-func'] : null;
    $email_func = isset($_POST['email-func']) ? $_POST['email-func'] : null;
    $jornada = isset($_POST['jornada']) ? $_POST['jornada'] : null;

    $createQuery = $pdo->prepare("INSERT INTO funcionario (nome_func, tel_func, endereco_func, dt_nasc_func, senha_func, email_func, FK_cod_jorn) VALUES ('$nome_func', '$tel_func', '$endereco_func', '$dt_nasc_func', '$senha_func', '$email_func', '$jornada')");

    $createQuery->execute();
  }
  ?>
  <script>
    const atualizarTelefone = (event) => {
      let input = event.target;
      input.value = mascaraTelefone(input.value);
    }

    const mascaraTelefone = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g, '');
      value = value.replace(/(\d{2})(\d)/, "($1) $2");
      value = value.replace(/(\d)(\d{4})$/, "$1-$2");
      return value;
    }
  </script>