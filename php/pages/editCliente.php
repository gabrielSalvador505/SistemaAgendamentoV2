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
    $sth = $pdo->prepare("SELECT id_cli, nome_cli, tel_cli, end_cli, dt_nasc_cli, email_cli FROM cliente WHERE id_cli ='" . $_GET['id'] .
        "';");
    $sth->execute();
    $edit_cli = $sth->fetch(PDO::FETCH_ASSOC);
    $data_nasc = new DateTime(isset($edit_cli['data_nasc_cli']));
    $data_nasc = $data_nasc->format('d/m/Y');
    if (isset($_POST['name'])) {
        $sth = $pdo->prepare("UPDATE cliente SET nome_cli = '" . $_POST['name'] . "', tel_cli = '" . $_POST['tel'] . "', end_cli = '" . $_POST['end'] . "', dt_nasc_cli = '" . $_POST['dt_nasc'] . "', email_cli= '" . $_POST['email'] . "' WHERE id_cli = " . $edit_cli['id_cli']);
        $sth->execute();

        if ($sth->execute()) {
            header("Location: adminClientes.php");
        }
    }
    ?>
    <div class="container-edit">
        <table class="table">
            <thead>
                <tr>
                    <th scope=" col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <form id="edit_cli" method="post">
                <tbody>
                    <th><?php echo $edit_cli['id_cli'] ?></th>
                    <td><input type="text" name="name" value="<?php echo $edit_cli['nome_cli'] ?>"></td>
                    <td><input style="width: 140px;" name="tel" type="text" value="<?php echo $edit_cli['tel_cli'] ?>"></td>
                    <td><input style="width: 300px;" name="end" type="text" value="<?php echo $edit_cli['end_cli'] ?>"></td>
                    <td><input style="width: 120px;" name="dt_nasc" type="date" value="<?php echo $edit_cli['dt_nasc_cli'] ?>"></td>
                    <td><input style="width: 300px;" name="email" type="text" value="<?php echo $edit_cli['email_cli'] ?>"></td>
                    <td><i class="fa-solid fa-check green-button" name="submit" id="submit" onclick="sendForm(edit_cli)"></i></td>
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