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
  <script>
    function sendForm(p) {
      p.submit();
    }
  </script>
  <div id="header-master-admin">
    <?php include '../items/header.php' ?>
    <?php include '../items/headerAdmin.php' ?>
  </div>
  <div class="container-admin">
    <?php
    $sth = $pdo->prepare("SELECT id_func, nome_func FROM funcionario;");
    $sth->execute();
    $funcionarios = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form method="post" id="func_agenda">
      <select name="func_agenda" id="func_agenda">
        <?php
        foreach ($funcionarios as $vetor) {
          echo "<option value='" . $vetor['id_func'] . "'>" . $vetor['nome_func'] . "</option>";
        }
        ?>
      </select>
      <button type="submit">Pesquisar</button>
    </form>
    <?php
    if (isset($_POST['func_agenda'])) {
      echo $_POST['func_agenda'];
      $sth = $pdo->prepare("SELECT * FROM agenda WHERE FK_func_agenda = '" . $_POST['func_agenda'] . "';");
      $sth->execute();
      $agenda = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table" style="margin: 20px auto; background-color: #fff;">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Data</th>
          <th scope="col">Hora</th>
          <th scope="col">Status</th>
          <th scope="col">Cliente</th>
          <th scope="col">Servico</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if (isset($_POST['func_agenda'])) {
          foreach ($agenda as $vetor) {
            $data_nasc = new DateTime($vetor['dt_nasc_cli']);
            $data_nasc = $data_nasc->format('d/m/Y'); ?>
            <tr>
              <th><?php echo $vetor['id_agenda'] ?></th>
              <td><?php echo $vetor['nome_cli'] ?></td>
              <td><?php echo $vetor['tel_cli'] ?></td>
              <td><?php echo $vetor['end_cli'] ?></td>
              <td><?php echo $data_nasc ?></td>
              <td><?php echo $vetor['email_cli'] ?></td>
              <td class="flex"><a href="./editCliente.php?id=<?php echo $vetor['id_cli'] ?>"><i class="fa-solid fa-pen-to-square yellow-button"></i></a>
                <a href="./adminClientes.php?delete=<?php echo $vetor['id_cli'] ?>"><i class="fa-solid fa-trash red-button"></a></i>
              </td>
            </tr>
        <?php }
        }
        ?>
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