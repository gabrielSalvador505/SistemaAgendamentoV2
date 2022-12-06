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
    $sth = $pdo->prepare("SELECT id_func, nome_func, tel_func, endereco_func, dt_nasc_func, email_func, FK_cod_jorn FROM funcionario WHERE id_func='" . $_GET['id'] . "'");
    $sth->execute();
    $edit_func = $sth->fetch(PDO::FETCH_ASSOC);
    $data_nasc = new DateTime(isset($edit_func['data_nasc_func']));
    $data_nasc = $data_nasc->format('d/m/Y');
    /*alterar informações funcionario*/
    if (isset($_POST['name'])) {
        $sth = $pdo->prepare("UPDATE funcionario SET nome_func = '" . $_POST['name'] . "', tel_func = '" . $_POST['tel'] . "', endereco_func = '" . $_POST['end'] . "', dt_nasc_func = '" . $_POST['dt_nasc'] . "', email_func= '" . $_POST['email'] . "' WHERE id_func =" . $edit_func['id_func']);
        $sth->execute();

        if ($sth->execute()) {
            header("Location: adminFuncionarios.php");
        }
    }
    /*remover servico*/
    if (isset($_GET['removeServ'])) {
        $sth = $pdo->prepare("DELETE FROM servico_funcionario WHERE FK_cod_serv ='" . $_GET['removeServ'] . "' AND FK_id_func ='" . $_GET['id'] . "'");
        $sth->execute();
    }
    /*servicos que ainda nao estao cadastrados no funcionario*/
    $sth = $pdo->prepare("SELECT servico.cod_serv, servico.nome_serv FROM servico");
    $sth->execute();
    $adicionar_servico = $sth->fetchAll(PDO::FETCH_ASSOC);

    /*adicionar servico ao funcionario*/
    if (isset($_GET['add'])) {
        $add = $_GET['add'];
        $id = $_GET['id'];
        $sth = $pdo->prepare("INSERT INTO `servico_funcionario`(FK_cod_serv, FK_id_func)" . "VALUES('$add', '$id');");
        $sth->execute();
    }
    ?>

    <div class="container-edit">
        <h1>Informações básicas</h1>
        <table class="table"">
            <thead>
                <tr>
                    <th scope=" col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">Email</th>
            <th scope="col">Confirmar</th>
            </tr>
            </thead>
            <form id="edit_func" method="post">
                <tbody>
                    <th><?php echo $edit_func['id_func'] ?></th>
                    <td><input type="text" autocomplete="off" name="name" value="<?php echo $edit_func['nome_func'] ?>"></td>
                    <td><input style="width: 140px;" autocomplete="off" name="tel" type="text" value="<?php echo $edit_func['tel_func'] ?>"></td>
                    <td><input style="width: 300px;" autocomplete="off" name="end" type="text" value="<?php echo $edit_func['endereco_func'] ?>"></td>
                    <td><input style="width: 120px;" autocomplete="off" name="dt_nasc" type="date" value="<?php echo $edit_func['dt_nasc_func'] ?>"></td>
                    <td><input style="width: 300px;" autocomplete="off" name="email" type="text" value="<?php echo $edit_func['email_func'] ?>"></td>
                    <td><i class="fa-solid fa-check yellow-button" onclick="sendForm(edit_func)"></i></td>
                </tbody>
            </form>
        </table>

        <?php
        $sth = $pdo->prepare("SELECT servico.cod_serv, servico.nome_serv, servico.desc_serv, servico.duracao_serv, servico.vlr_serv FROM servico_funcionario INNER JOIN servico ON FK_cod_serv = servico.cod_serv WHERE FK_id_func = '" . $_GET['id'] . "'");
        $sth->execute();
        $servicos_func = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h1>Serviços</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicos_func as $vetor) { ?>
                    <tr>
                        <th><?php echo $vetor['cod_serv'] ?></th>
                        <td><?php echo $vetor['nome_serv'] ?></td>
                        <td><?php echo $vetor['desc_serv'] ?></td>
                        <td><?php echo $vetor['duracao_serv'] ?></td>
                        <td>R$ <?php echo $vetor['vlr_serv'] ?>,00</td>
                        <td>
                            <form method="get"><a href="editFuncionario.php?id=<?php echo $_GET['id'] ?>&removeServ=<?php echo $vetor['cod_serv'] ?>"><i class="fa-solid fa-minus red-button"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <spam class="green-button" onclick="callModal()">Adicionar Serviço</spam>
    </div>
    <div id="modal-add-servico-func">
        <table class="table">
            <h1>Escolher Serviço</h1>
            <thead>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Adicionar</th>
            </thead>
            <tbody>
                <?php foreach ($adicionar_servico as $vetor) { ?>
                    <tr>
                        <th><?php echo $vetor['cod_serv'] ?></th>
                        <td><?php echo $vetor['nome_serv'] ?></td>
                        <td><a href="editFuncionario.php?id=<?php echo $_GET['id'] ?>&add=<?php echo $vetor['cod_serv'] ?>"><i class="fa-solid fa-plus green-button"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div id="background-element"></div>
    <div id="background-element-2"></div>
    <div id="background-element-3"></div>
    <div id="background-element-3"></div>
    <div id="background-element-4"></div>
    <div id="background-element-5"></div>
</body>

<script>
    function callModal() {
        document.getElementById('modal-add-servico-func').style.display = 'block';
    }

    function sendForm(p) {
        p.submit();
    }
</script>
<script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
<script src="../../js/poopper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/validation.js"></script>
</body>

</html>