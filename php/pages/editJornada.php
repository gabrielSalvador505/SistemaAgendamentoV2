<?php
session_start();
require_once "../items/conexao.php";
$pdo = conectar();
?>
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
  $sth = $pdo->prepare("SELECT * FROM jornada WHERE cod_jorn ='" . $_GET['id'] .
    "';");
  $sth->execute();
  $edit_jorn = $sth->fetch(PDO::FETCH_ASSOC);
  if (isset($_POST['ini'])) {
    $sth = $pdo->prepare("UPDATE jornada SET ini_jorn = '" . $_POST['ini'] . "', ini_pausa_jorn = '" . $_POST['pausa'] . "', fim_pausa_jorn = '" . $_POST['fim-pausa'] . "', fim_jorn = '" . $_POST['fim'] . "' WHERE cod_jorn = " . $edit_jorn['cod_jorn']);
    $sth->execute();

    if ($sth->execute()) {
      header("Location: adminJornadas.php");
    }
  }
  ?>
  <div class="container-edit">
    <table class="table">
      <thead>
        <tr>
          <th scope=" col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Duração</th>
          <th scope="col">Valor</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <form id="edit_serv" method="post">
        <tbody>
          <th><?php echo $edit_jorn['cod_jorn'] ?></th>
          <td><input type="text" name="ini" value="<?php echo $edit_jorn['ini_jorn'] ?>"></td>
          <td><input style="width: 140px;" name="pausa" type="text" value="<?php echo $edit_jorn['ini_pausa_jorn'] ?>"></td>
          <td><input style="width: 300px;" name="fim-pausa" type="text" value="<?php echo $edit_jorn['fim_pausa_jorn'] ?>"></td>
          <td><input style="width: 120px;" name="fim" type="text" value="<?php echo $edit_jorn['fim_jorn'] ?>"></td>
          <td><i class="fa-solid fa-check green-button" name="submit" id="submit" onclick="sendForm(edit_serv)"></i></td>
        </tbody>
      </form>
    </table>
  </div>

  <script>
    function sendForm(p) {
      p.submit();
    }
  </script>
  <div id="background-element"></div>
  <div id="background-element-2"></div>
  <div id="background-element-3"></div>
  <div id="background-element-3"></div>
  <div id="background-element-4"></div>
  <div id="background-element-5"></div>
</body>
<script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
<script src="../../js/poopper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/validation.js"></script>
</body>

</html>