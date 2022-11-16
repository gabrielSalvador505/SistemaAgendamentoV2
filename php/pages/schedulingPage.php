<?php
session_start();
require_once("../items/conexao.php");
$pdo = conectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agendamento</title>
    <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script> <!-- Ícones -->

    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body>
    <?php include '../items/header.php' ?>


    <?php
    $sth = $pdo->prepare("SELECT * FROM servico");  //armazena a consulta em uma variável
    $sth->execute();                                //executa a consulta
    $servico = $sth->fetchAll(PDO::FETCH_ASSOC);    //armazena o resultado da consulta
    ?>

    <?php
    $url = $_SERVER["REQUEST_URI"];        //armazena a url atual em uma variavel
    $part = parse_url($url);               //trata a variavel, transformando em uma query
    if (!empty($part['query'])) {          //
        $vars = [];                        //
        parse_str($part['query'], $vars);  //armazena a query em um array
    }


    ?>

    <script>
        function sendForm(p) { //função para enviar formulário assim que um valor é inserido
            p.submit();
        }
    </script>

    <form id="form_agenda" method="get">
        <div id="container_servico" onchange="sendForm(form_agenda)">

            <?php
            foreach ($servico as $vetor) {
                echo "<label for='serv" . $vetor['cod_serv'] . "'>";
                echo "<input type='radio' name='servico'  class='serv_input' id='serv" . $vetor['cod_serv'] . "' value='" . $vetor['cod_serv'] . "'>";
                echo "<span>" . $vetor['nome_serv'] . "</span>";
                echo "</label>";
            }
            ?>
        </div>

        <script>
            let s_inp = document.getElementsByClassName("serv_input"); //armazena todos os inputs do formulário de serviço
            for (i = 0; i < s_inp.length; i++) { //loop para deixar um input selecionado após o envio do form
                if (s_inp[i].value == <?php echo $vars['servico'] ?>) {
                    s_inp[i].checked = true;
                }
            }
        </script>

        <div id="container_funcionario" onchange="sendForm(form_agenda)">
            <?php
            if (!empty($vars['servico'])) {
                $sth = $pdo->prepare("SELECT funcionario.* FROM servico_funcionario INNER JOIN funcionario ON servico_funcionario.FK_id_func = funcionario.id_func WHERE servico_funcionario.FK_cod_serv = '" . $vars['servico'] . "' GROUP BY funcionario.id_func;");
                $sth->execute();
                $funcionario = $sth->fetchAll(PDO::FETCH_ASSOC);

                foreach ($funcionario as $vetor) { //estrutura dos inputs funcionario
                    echo "<label for='func" . $vetor['id_func'] . "'>";
                    echo "<input type='radio' name='funcionario'  class='func_input' id='func" . $vetor['id_func'] . "' value='" . $vetor['id_func'] . "'>";
                    echo "<span>" . $vetor['nome_func'] . "</span>";
                    echo "</label>";
                }
            }
            ?>
        </div>
        <script>
            let f_inp = document.getElementsByClassName("func_input"); //armazena todos os inputs do formulário de fubcionario
            for (i = 0; i < f_inp.length; i++) { //loop para deixar um input selecionado após o envio do form
                if (f_inp[i].value == <?php echo $vars['funcionario'] ?>) {
                    f_inp[i].checked = true;
                }
            }
        </script>

        <div id="container_dia" onchange="sendForm(form_agenda)">
            <?php
            if (!empty($vars['funcionario'])) {
                $sth = $pdo->prepare("SELECT agenda.data_agenda FROM agenda INNER JOIN funcionario ON funcionario.id_func = agenda.FK_func_agenda WHERE agenda.FK_func_agenda = '" . $vars['funcionario'] . "' AND agenda.status_agenda = 'L' GROUP BY agenda.data_agenda;");
                $sth->execute();
                $data = $sth->fetchAll(PDO::FETCH_ASSOC);

                foreach ($data as $vetor) {
                    $dia = new DateTime($vetor['data_agenda']);
                    $dia = $dia->format('d');
                    echo "<label for='dia" . $dia . "'>";
                    echo "<input type='radio' name='dia'  class='dia_input' id='dia" . $dia . "' value='" . $dia . "'>";
                    echo "<span>" . $dia . "</span>";
                    echo "</label>";
                }
            }
            ?>
            <script>
                let d_inp = document.getElementsByClassName("dia_input"); //armazena todos os inputs do formulário de serviço
                for (i = 0; i < d_inp.length; i++) { //loop para deixar um input selecionado após o envio do form
                    if (d_inp[i].value == <?php echo $vars['dia'] ?>) {
                        d_inp[i].checked = true;
                    }
                }
            </script>
        </div>
        <div id="container_hora" onchange="sendForm(form_agenda)">
            <?php
            if (!empty($vars['dia'])) {
                $sth = $pdo->prepare("SELECT agenda.hora_agenda FROM agenda INNER JOIN funcionario ON funcionario.id_func = agenda.FK_func_agenda WHERE agenda.FK_func_agenda = '" . $vars['funcionario'] . "' AND agenda.status_agenda = 'L' AND agenda.data_agenda LIKE '%" . $dia . "';");
                $sth->execute();
                $hora = $sth->fetchAll(PDO::FETCH_ASSOC);

                foreach ($hora as $vetor) {
                    $hora = new DateTime($vetor['hora_agenda']);
                    $hora = $hora->format('H:i');
                    echo "<label for='hora" . $hora . "'>";
                    echo "<input type='radio' name='hora' class='hora_input' id='hora" . $hora . "' value='" . $hora . "'>";
                    echo "<span>" . $hora . "</span>";
                    echo "</label>";
                }
            }
            ?>
        </div>
    </form>
    <!-- $id_func = $vars['funcionario'];
        $data = new DateTime('01-12-2022');
        $dataFormatada = $data->format('Y-m-d');
        $horaFormatada = $data->format('H:i:s');
        $mes = $data->format('m');

        while ($mes == '12') {
        $sth = $pdo->prepare("INSERT INTO agenda (data_agenda, hora_agenda, FK_func_agenda) VALUES ('$dataFormatada', '$horaFormatada', '$id_func')");
        $sth->execute();
        $data->modify('+30 minute');
        $mes = $data->format('m');
        $dataFormatada = $data->format('Y-m-d');
        $horaFormatada = $data->format('H:i:s');
        } -->

    <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
    <script src="../../js/poopper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/validation.js"></script>
</body>

</html>