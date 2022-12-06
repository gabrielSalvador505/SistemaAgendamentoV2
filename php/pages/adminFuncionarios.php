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
  <div class="container-admin">
    <?php
    $sth = $pdo->prepare("SELECT id_func, nome_func, tel_func, endereco_func, dt_nasc_func, email_func, FK_cod_jorn FROM funcionario");
    $sth->execute();
    $funcionarios = $sth->fetchAll(PDO::FETCH_ASSOC);
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
          <th scope="col">Jornada</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($funcionarios as $vetor) {
          $data_nasc = new DateTime($vetor['dt_nasc_func']);
          $data_nasc = $data_nasc->format('d/m/Y'); ?>
          <tr>
            <th><?php echo $vetor['id_func'] ?></th>
            <td><?php echo $vetor['nome_func'] ?></td>
            <td><?php echo $vetor['tel_func'] ?></td>
            <td><?php echo $vetor['endereco_func'] ?></td>
            <td><?php echo $data_nasc ?></td>
            <td><?php echo $vetor['email_func'] ?></td>
            <td><?php echo $vetor['FK_cod_jorn'] ?></td>
            <td class="flex"><a href="./editFuncionario.php?id=<?php echo $vetor['id_func'] ?>"><i class="fa-solid fa-pen-to-square yellow-button"></i></a>
              <a href="./adminFuncionarios.php?delete=<?php echo $vetor['id_func'] ?>"><i class="fa-solid fa-trash red-button" id="deleteFunc"></a></i>
              <a class="green-button"href="./adminFuncionarios.php?gera=<?php echo $vetor['id_func']?>">Gerar agenda</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a class="green-button" href="./addFuncionario.php"><spam class="green-button">Adicionar Funcionário</spam></a>
  </div>

  
  <?php
  if (isset($_GET['gera'])) {
    $sth = $pdo->prepare("SELECT funcionario.*, jornada.* FROM funcionario INNER JOIN jornada ON funcionario.FK_cod_jorn = jornada.cod_jorn WHERE funcionario.id_func ='". $_GET['gera'] ."';");
    $sth->execute();
    $func_jorn = $sth->fetchAll(PDO::FETCH_ASSOC);

    $id_func = $_GET['gera'];
    $data = new DateTime('01-12-2022');
    $dataFormatada = $data->format('Y-m-d');
    $horaFormatada = $data->format('H:i:s');
    $mes = $data->format('m');
  
      $sth = $pdo->prepare("INSERT INTO agenda (data_agenda, hora_agenda, FK_func_agenda, status_agenda) VALUES ('$dataFormatada', '$horaFormatada', '$id_func', 'O')");
      $sth->execute();
      $data->modify('+30 minute');
      $mes = $data->format('m');
      $dataFormatada = $data->format('Y-m-d');
      $horaFormatada = $data->format('H:i:s');
    }
  if (isset($_GET['delete'])) {
    $sth = $pdo->prepare("DELETE FROM agenda WHERE FK_func_agenda = '" . $_GET['delete'] . "';");
    $sth->execute();
    $sth = $pdo->prepare("DELETE FROM servico_funcionario WHERE FK_id_func =' "  . $_GET['delete'] . "';");
    $sth->execute();
    $sth = $pdo->prepare("DELETE FROM funcionario WHERE id_func =' "  . $_GET['delete'] . "';");

    if ($sth->execute()) {
      unset($_GET['delete']);
      die();
    }
  }
  ?>
  <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
  <script src="../../js/poopper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>

</html>