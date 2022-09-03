<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de Horário</title>
</head>

<body>
    <h1>Inclusão Horário</h1>

    <form method="POST">
        <div class="form-group">
            <label>Entrada Jornada</label>
            <input type="time" name="entradaJ" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Saida Jornada</label>
            <input type="time" name="saidaJ" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Saida do Intervalo</label>
            <input type="time" name="saidaI" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Saida da jornada</label>
            <input type="time" name="saidaJ" class="form-control col-6" placeholder="Descrição">
        </div>
        <br>
        <button type="submit" name="btnSalvar" class="btn btn-primary">Salvar</button>
        <button type="reset" name="btnLimpar" class="btn btn-warning">Limpar</button>

    </form>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
<?php
require_once "conexao.php";

$pdo = conectar();

if (isset($_POST['btnSalvar'])) {

    // buscar o conteudo do input descricao
    $entradaJ = isset($_POST['entradaJ']) ? $_POST['entradaJ'] : null;
    $saidaJ = isset($_POST['saidaJ']) ? $_POST['saidaJ'] : null;
    $saidaI = isset($_POST['saidaI']) ? $_POST['saidaI'] : null;
    $saidaJ = isset($_POST['saidaJ']) ? $_POST['saidaJ'] : null;

    // validando os dados vindos
    if (empty($entradaJ)) {
        echo "Necessário informar a Entrada do Funcionario";
        exit();
    }
    if (empty($saidaJ)) {
        echo "Necessário informar o Começo do Intervalo";
        exit();
    }
    if (empty($saidaI)) {
        echo "Necessário informar o Fim do intervalo";
        exit();
    }
    if (empty($saidaJ)) {
        echo "Necessário informar o Fim da jornada de trabalho";
        exit();
    }

    $sql = "INSERT INTO jornada (entrada_jornada, saida_intervalo_jornada, entrada_intervalo_jornada, saida_jornada) VALUES (:ej, :si, :ei, :sj);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ej', $entradaJ);
    $stmt->bindParam(':si', $saidaJ);
    $stmt->bindParam(':ei', $saidaI);
    $stmt->bindParam(':sj', $saidaJ);

    if ($stmt->execute()) {
        echo "Registro inserido com sucesso";
    }
}

?>