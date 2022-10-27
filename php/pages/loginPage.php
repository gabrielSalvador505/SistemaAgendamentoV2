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
  <title>Login Agendamento</title>
  <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script> <!-- Ícones -->

  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body style="background-color: rgb(240, 240, 240);">
  <?php include '../items/header.php' ?>
  <!-- Importando Header -->
  <div id="loginpageTop"></div>
  <div id="loginPage">
    <div id="login">
      <!-- Fomulário de Login -->
      <h1>Entrar</h1>
      <form method="POST">
        <div class="form-group">
          <label for="emailLogin">Email</label>
          <input type="email" class="form-control" id="emailLogin" name="emailLogin" placeholder="Insira seu Email" required onchange="emailValidate()" />
        </div>
        <div class="form-group">
          <label for="passLogin">Senha</label>
          <input type="password" class="form-control" id="passLogin" name="senhaLogin" placeholder="Senha" required />
          <a href="#" id="passHelp" class="form-text text-muted">Esqueceu sua senha?</a>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" name="check" id="check">
          <label for="check" id="label-check">Manter conectado</label>
        </div>
        <button type="submit" class="btn__" name="BtnEntrar">Confirmar</button>
        <small class="form-text text-muted text-center">Não possui uma conta? <a onclick="alterContainer()" id="link">Crie uma</a></small>
      </form>
    </div>

    <div id="createAccount">
      <!-- Fomulário de Cadastro de Cliente -->
      <h1>Criar uma conta</h1>
      <form method="POST" action="" id="formRegister">
        <div class="row">
          <div class="col">
            <div class="form-group mx-0">
              <label for="name">Nome</label>
              <input type="text" class="form-control required" id="name" name="nome" placeholder="Seu nome completo" autocomplete="off" required onchange="nameValidate()" />
              <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
            </div>
          </div>
          <div class="col">
            <div class="form-group mx-0">
              <label for="date">Data de Nascimento</label>
              <input type="date" class="form-control" id="date" name="datanasc" autocomplete="off" required />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group mx-0">
              <label for="telefone">Telefone</label>
              <input type="tel" class="form-control required" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" autocomplete="off" maxlength="15" onkeyup="atualizarTelefone(event)" required onchange="phoneValidate()" />
              <span class="span-required">Formato incompatível</span>
            </div>
          </div>
          <div class="col">
            <div class="form-group mx-0">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua e número de sua casa" autocomplete="off" required />
              <small class="text-form text-muted">Ex: Rua Visconde de Guarapuava, 248</small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group mx-0">
              <label for="email">Email</label>
              <input type="email" class="form-control required" id="email" name="email" placeholder="Insira seu Email" required onchange="emailValidate()" />
              <span class="span-required">Formato incompatível</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group mx-0">
              <label for="pass">Senha</label>
              <input type="password" class="form-control required" id="pass" name="senha" placeholder="Crie uma senha" autocomplete="off" required onchange="passValidate()" />
              <span class="span-required">No mínimo 8 caracteres</span>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group mx-0">
              <label for="confpass">Confirme sua senha</label>
              <input type="password" class="form-control required" id="confpass" name="confpass" placeholder="Confirme dua senha" autocomplete="off" required onchange="passConfirm()" />
              <span class="span-required">Senhas não conferem</span>
            </div>
          </div>
        </div>
        <button type="submit" name="btnSalvar" class="btn__">Criar</button>
        <small class="form-text text-muted text-center">Já possui uma conta? <a onclick="alterContainer()" id="link">Entrar</a></small>
      </form>
    </div>
  </div>
  <script src="../../js/jquery-slim.min.js"></script> <!-- JavaScript do Bootstrap -->
  <script src="../../js/poopper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/validation.js"></script>

  <script>
    //Alterar formulário
    function alterContainer() {
      if (document.getElementById("login").style.display == "none") {
        document.getElementById("login").style.display = "flex";
        document.getElementById("createAccount").style.display = "none";
      } else {
        document.getElementById("createAccount").style.display = "flex";
        document.getElementById("login").style.display = "none";
      }
    }
    //Máscara telefone

    const atualizarTelefone = (event) => {
      let input = event.target;
      input.value = mascaraTelefone(input.value);
      console.log(input.value);
    }

    const mascaraTelefone = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g,'');
      value = value.replace(/(\d{2})(\d)/, "($1) $2");
      value = value.replace(/(\d)(\d{4})$/,"$1-$2");
      return value;
    }
  </script>
</body>

</html>

<?php //PHP do Login
if (isset($_POST['BtnEntrar'])) {
  $emailLogin = isset($_POST['emailLogin']) ? $_POST['emailLogin'] : null;
  $senhaLogin = isset($_POST['senhaLogin']) ? ($_POST['senhaLogin']) : null;

  $stmt2 = $pdo->prepare("SELECT email_cliente, senha_cliente, nome_cliente FROM cliente WHERE email_cliente = :email AND senha_cliente = :senha");

  $stmt2->bindParam(':email', $emailLogin);
  $stmt2->bindParam(':senha', $senhaLogin);

  $stmt2->execute();

  $resultLogin = $stmt2->fetch();

  if ($stmt2->rowCount() > 0) {
    echo "<script>location.href='index.php'</script>";
    $_SESSION['user'] = $resultLogin['nome_cliente'];
    $_SESSION['email'] = $resultLogin['email_cliente'];
    exit;
  } else {
    echo "<script>alert('Usuário ou senha não são válidos.');history.back();</script>";
  }

}
?>

<?php //PHP do Cadastro de Cliente
if (isset($_POST['btnSalvar'])) {
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
  $datanasc = isset($_POST['datanasc']) ? $_POST['datanasc'] : null;
  $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;

  $sql = "INSERT INTO cliente (nome_cliente, telefone_cliente, email_cliente, senha_cliente, data_nasc, endereco_cliente) VALUES (:n, :t, :e, :s, :d, :en);";

  $stmt = $pdo->prepare($sql);  //preparando o sql para receber os dados

  //troca dos dados pelo que esta vindo no formulário
  $stmt->bindParam(':n', $nome);
  $stmt->bindParam(':t', $telefone);
  $stmt->bindParam(':e', $email);
  $stmt->bindParam(':s', $senha);
  $stmt->bindParam(':d', $datanasc);
  $stmt->bindParam(':en', $endereco);

  if ($stmt->execute()) {
    echo "<script>alert('Cadastro Realizado'); alterContainer();</script>";
  }
}
?>