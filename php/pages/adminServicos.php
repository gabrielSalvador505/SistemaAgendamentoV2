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

  <?php
  $sth = $pdo->prepare("SELECT * FROM servico");
  $sth->execute();
  $servicos = $sth->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div id="container-admin">
    <table class="table" style="margin: 20px auto; background-color: #fff;" id="table-servicos">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Valor</th>
          <th scope="col">Duração</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($servicos as $vetor) { ?>
          <tr>
            <th><?php echo $vetor['cod_serv'] ?></th>
            <td><?php echo $vetor['nome_serv'] ?></td>
            <td><?php echo "R$" . $vetor['vlr_serv'] . ",00" ?></td>
            <td><?php echo $vetor['duracao_serv'] ?></td>
            <td class="flex"><a href="./editServico.php?id=<?php echo $vetor['cod_serv'] ?>"><i class="fa-solid fa-pen-to-square yellow-button"></i></a>
              <a href="./adminServicos.php?delete=<?php echo $vetor['cod_serv'] ?>"><i class="fa-solid fa-trash red-button" id="deleteFunc"></a></i>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a class="green-button" id="green-button-servico" href="./addServico.php">
      <spam class="green-button">Adicionar Serviço</spam>
    </a>
  </div>
  <?php
  if (isset($_GET['delete'])) {
    $sth = $pdo->prepare("DELETE FROM servico WHERE cod_serv =' "  . $_GET['delete'] . "';");

    if ($sth->execute()) {
      unset($_GET['delete']);
      die();
    }
  }
  ?>