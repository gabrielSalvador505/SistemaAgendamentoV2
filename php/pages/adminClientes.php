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
  <?php include '../items/headerAdmin.php'?>
  <div class="container-admin">
    <?php
    $sth = $pdo->prepare("SELECT id_cli, nome_cli, tel_cli, end_cli, dt_nasc_cli, email_cli FROM cliente");
    $sth->execute();
    $clientes = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table" style="margin: 20px auto; background-color: #fff;">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col">Data Nascimento</th>
          <th scope="col">Email</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $vetor) {
          $data_nasc = new DateTime($vetor['dt_nasc_cli']);
          $data_nasc = $data_nasc->format('d/m/Y'); ?>
          <tr>
            <th><?php echo $vetor['id_cli'] ?></th>
            <td><?php echo $vetor['nome_cli'] ?></td>
            <td><?php echo $vetor['tel_cli'] ?></td>
            <td><?php echo $vetor['end_cli'] ?></td>
            <td><?php echo $data_nasc ?></td>
            <td><?php echo $vetor['email_cli'] ?></td>
            <td class="flex"><a href="./editCliente.php?id=<?php echo $vetor['id_cli'] ?>"><i class="fa-solid fa-pen-to-square yellow-button"></i></a>
              <a href="./adminClientes.php?delete=<?php echo $vetor['id_cli'] ?>"><i class="fa-solid fa-trash red-button"></a></i>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php
  if (isset($_GET['delete'])) {
    $sth = $pdo->prepare("DELETE FROM cliente WHERE id_cli =' "  . $_GET['delete'] . "';");
    $sth->execute();
    if ($sth->execute()) {
      header('Location: adminPage.php');
      die();
    }
  }
  ?>
  <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
  <script src="../../js/poopper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/validation.js"></script>
</body>

</html>