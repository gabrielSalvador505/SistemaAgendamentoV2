<?php
require_once "conexao.php";

$pdo = conectar();

// criando um select para pegar todas as 
// categorias que tem na tabela.

$sqlcat = "SELECT * FROM funcionario INNER JOIN servico, jornada";
// preparando o sql para não aceitar sql injection
$stmtcat = $pdo->prepare($sqlcat);
$stmtcat->execute();

// pegando todos os dados da tabela
$funcionario = $stmtcat->fetchAll();
//print_r($categorias); //mostrar na tela o conteudo da variavel
//var_dump($categorias);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de Funcionarios</title>
</head>

<body>
    <h1>Inclusão de Funcionarios</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="NomeFunc" class="form-control col-6" placeholder="NomeFunc">
        </div>
        <br>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="TellFunc" class="form-control col-6">
        </div>
        <br>
        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="EnderecoFunc" class="form-control col-6">
        </div>
        <br>
        <div class="form-group">
            <label>Data</label>
            <input type="date" name="DataNascFunc" class="form-control col-6">
        </div>
        <br>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="SenhaFunc" class="form-control col-6">
        </div>
        <br>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="EmailFunc" class="form-control col-6">
        </div>
        <br>
        <div class="form-group">
            <label>Jornada</label>
            <!-- Aqui entra o codigo da chave estrangeira -->
            <select name="jornada_cod" class="form-control col-6">
                <option>-- Escolha --</option>
                <!-- Sempre dentro do select vai o codigo php
                     que carrega os dados da tabela 
                -->
                <?php
                foreach ($funcionario as $f) {
                ?>
                    <option value="<?php echo $f['entrada_jornada']; ?>"><?php echo $f['entrada_jornada']; ?></option>
                <?php } ?>
            </select>
            <label>Serviço</label>
            <!-- Aqui entra o codigo da chave estrangeira -->
            <select name="servico_cod" class="form-control col-6">
                <option>-- Escolha --</option>
                <!-- Sempre dentro do select vai o codigo php
                     que carrega os dados da tabela 
                -->
                <?php
                foreach ($funcionario as $f) {
                ?>
                    <option value="<?php echo $f['servico_cod']; ?>"><?php echo $f['nome_servico']; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <button type="submit" name="btnSalvar" class="btn btn-primary">Enviar</button>
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
if (isset($_POST['btnSalvar'])) {

    // buscar o conteudo dos inputs 
    $NomeFunc  = isset($_POST['NomeFunc']) ? $_POST['NomeFunc'] : null;
    $TellFunc    = isset($_POST['TellFunc']) ? $_POST['TellFunc'] : null;
    $EnderecoFunc  = isset($_POST['EnderecoFunc']) ? $_POST['EnderecoFunc'] : null;
    $DataNascFunc  = isset($_POST['DataNascFunc']) ? $_POST['DataNascFunc'] : null;
    $SenhaFunc  = isset($_POST['SenhaFunc']) ? $_POST['SenhaFunc'] : null;
    $EmailFunc  = isset($_POST['EmailFunc']) ? $_POST['EmailFunc'] : null;
    $jornada_cod  = isset($_POST['jornada_cod']) ? $_POST['jornada_cod'] : null;
    $servico_cod  = isset($_POST['jornada_cod']) ? $_POST['servico_cod'] : null;



    // validando os dados vindos
    if (empty($NomeFunc)) {
        echo "Necessário informar o Nome";
        exit();
    }
    if (empty($TellFunc)) {
        echo "Necessário informar o Telefone";
        exit();
    }
    if (empty($EnderecoFunc)) {
        echo "Necessário informar o Endereço";
        exit();
    }
    if (empty($DataNascFunc)) {
        echo "Necessário informar a Data";
        exit();
    }if (empty($SenhaFunc)) {
        echo "Necessário informar a Senha";
        exit();
    }if (empty($EmailFunc)) {
        echo "Necessário informar o Email";
        exit();
    }


    $sql = "INSERT INTO funcionario (nome_func, telefone_func, endereco_func, data_nasc_func, senha_func, email_func, jornada_cod, servico_cod) VALUES (:nome_func, :telefone_func, :endereco_func, :data_nasc_func, :senha_func, :email_func, :jornada_cod, :servico_cod);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome_func', $NomeFunc);
    $stmt->bindParam(':telefone_func', $TellFunc);
    $stmt->bindParam(':endereco_func', $EnderecoFunc);
    $stmt->bindParam(':data_nasc_func', $DataNascFunc);
    $stmt->bindParam(':senha_func', $SenhaFunc);
    $stmt->bindParam(':email_func', $EmailFunc);
    $stmt->bindParam(':jornada_cod', $jornada_cod);
    $stmt->bindParam(':jornada_cod', $jornada_cod);
    $stmt->bindParam(':servico_cod', $servico_cod);

    if ($stmt->execute()) {
        echo "Registro inserido com sucesso";
    }
}

?>