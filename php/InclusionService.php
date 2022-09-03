<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de Serviços</title>
</head>

<body>
    <h1>Inclusão Serviço</h1>

    <form method="POST">
        <div class="form-group">
            <label>Nome Serviço</label>
            <input type="text" name="NomeServ" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Descrição do serviço</label>
            <input type="text" name="DescServ" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Valor do serviço</label>
            <input type="text" name="ValorServ" class="form-control col-6" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Duração Serviço</label>
            <input type="time" name="DuracaoServ" class="form-control col-6" placeholder="Descrição">
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
    $NomeServ = isset($_POST['NomeServ']) ? $_POST['NomeServ'] : null;
    $DescServ = isset($_POST['DescServ']) ? $_POST['DescServ'] : null;
    $ValorServ = isset($_POST['ValorServ']) ? $_POST['ValorServ'] : null;
    $DuracaoServ = isset($_POST['DuracaoServ']) ? $_POST['DuracaoServ'] : null;

    // validando os dados vindos
    if (empty($NomeServ)) {
        echo "Necessário informar o nome do Serviço";
        exit();
    }
    if (empty($DescServ)) {
        echo "Necessário informar a descrição do serviço";
        exit();
    }
    if (empty($ValorServ)) {
        echo "Necessário informar o valor do serviço";
        exit();
    }
    if (empty($DuracaoServ)) {
        echo "Necessário informar a duração do serviço";
        exit();
    }

    $sql = "INSERT INTO servico (nome_servico, descricao_servico, valor_servico, duracao_servico) VALUES (:ns, :dds, :vs, :ds);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ns', $NomeServ);
    $stmt->bindParam(':dds', $DescServ);
    $stmt->bindParam(':vs', $ValorServ);
    $stmt->bindParam(':ds', $DuracaoServ);

    if ($stmt->execute()) {
        echo "Registro inserido com sucesso";
    }
}

?>