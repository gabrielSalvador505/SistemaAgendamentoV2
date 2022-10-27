<?php
session_start();
require_once "../items/conexao.php";
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

    <div id="containerAgendamento">
        <div id="headerAgendamento">
            <h1>AGENDAMENTO</h1>
        </div>
        <div id="bodyAgendamento">
            <form method="get" id="servico_agen">
                <h2>Serviço</h2>
                <input type="radio" name="serv_item" id="cabelo_serv">
                <label for="cabelo_serv">Cabelo</label>
                <input type="radio" name="serv_item" id="unha_serv">
                <label for="unha_serv">Unha</label>
                <input type="radio" name="serv_item" id="pele_serv">
                <label for="pele_serv">Pele</label>
            </form>
            <form method="get" id="professional_agen">
                <h2>Profissional</h2>
                <input type="radio" name="professional_item" id="professional1">
                <label for="professional1">Amanda</label>
                <input type="radio" name="professional_item" id="professional2">
                <label for="professional2">Shara</label>
                <input type="radio" name="professional_item" id="professional3">
                <label for="professional3">Lana</label>
            </form>
            <form method="get" id="dia_agen">
                <h2>Dia</h2>
                <input type="radio" name="dia_item" id="1">
                <label for="1">1</label>
                <input type="radio" name="dia_item" id="2">
                <label for="2">2</label>
                <input type="radio" name="dia_item" id="3">
                <label for="3">3</label>
                <input type="radio" name="dia_item" id="4">
                <label for="4">4</label>
                <input type="radio" name="dia_item" id="5">
                <label for="5">5</label>
                <input type="radio" name="dia_item" id="6">
                <label for="6">6</label>
                <input type="radio" name="dia_item" id="7">
                <label for="7">7</label>
                <input type="radio" name="dia_item" id="8">
                <label for="8">8</label>
                <input type="radio" name="dia_item" id="9">
                <label for="9">9</label>
                <input type="radio" name="dia_item" id="10">
                <label for="10">10</label>
                <input type="radio" name="dia_item" id="11">
                <label for="11">11</label>
                <input type="radio" name="dia_item" id="12">
                <label for="12">12</label>
                <input type="radio" name="dia_item" id="13">
                <label for="13">13</label>
                <input type="radio" name="dia_item" id="14">
                <label for="14">14</label>
                <input type="radio" name="dia_item" id="15">
                <label for="15">15</label>
                <input type="radio" name="dia_item" id="16">
                <label for="16">16</label>
                <input type="radio" name="dia_item" id="17">
                <label for="17">17</label>
                <input type="radio" name="dia_item" id="18">
                <label for="18">18</label>
            </form>
            <form method="get" id="hora_agen">
                <h2>Horário</h2>
               <input type="radio" name="hora_item" id="h7">
               <label for="h7">07:00</label>
               <input type="radio" name="hora_item" id="h7.5">
               <label for="h7.5">07:30</label>
               <input type="radio" name="hora_item" id="h8">
               <label for="h8">08:00</label>
               <input type="radio" name="hora_item" id="h8.5">
               <label for="h8.5">08:30</label>
               <input type="radio" name="hora_item" id="h9">
               <label for="h9">09:00</label>
               <input type="radio" name="hora_item" id="h9.5">
               <label for="h9.5">09:30</label>
               <input type="radio" name="hora_item" id="h10">
               <label for="h10">10:00</label>
               <input type="radio" name="hora_item" id="h10.5">
               <label for="h10.5">10:30</label>
               <input type="radio" name="hora_item" id="h11">
               <label for="h11">11:00</label>
               <input type="radio" name="hora_item" id="h11.5">
               <label for="h11.5">11:30</label>
               <input type="radio" name="hora_item" id="h12">
               <label for="h12">12:00</label>
               <input type="radio" name="hora_item" id="h12.5">
               <label for="h12.5">12:30</label>
               <input type="radio" name="hora_item" id="h13">
               <label for="h13">13:00</label>
               <input type="radio" name="hora_item" id="h13.5">
               <label for="h13.5">13:30</label>
               <input type="radio" name="hora_item" id="h14">
               <label for="h14">14:00</label>
               <input type="radio" name="hora_item" id="h14.5">
               <label for="h14.5">14:30</label>
               <input type="radio" name="hora_item" id="h15">
               <label for="h15">15:00</label>
            </form>

        </div>
    </div>

    <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
    <script src="../../js/poopper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/validation.js"></script>
</body>

</html>