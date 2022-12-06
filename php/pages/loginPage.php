<?php
session_start();
require_once("../items/conexao.php");
$pdo = conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Agendamento</title>
  <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script> <!-- Ícones -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Montserrat:wght@400;700&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="icon" href="../../assets/favicon.png">
  <link rel="stylesheet" href="../../css/main.css"> <!-- Custom CSS -->
</head>

<body style="">
  <div id="background-element"></div>
  <div id="background-element-2"></div>
  <div id="background-element-3"></div>
  <div id="background-element-4"></div>
  <!-- Importando Header -->
  <div id="loginpageTop"></div>
  <div id="loginPage">
    <div id="login">
      <!-- Fomulário de Login -->
      <h1>Acesse sua conta</h1>
      <form method="POST">
        <div class="form-group">
          <label for="emailLogin">Email</label>
          <input type="email" class="form-control" id="emailLogin" name="emailLogin" placeholder="Insira seu Email" required onchange="emailValidate()" />
        </div>
        <div class="form-group">
          <label for="passLogin">Senha</label>
          <input type="password" class="form-control" id="passLogin" name="senhaLogin" placeholder="Senha" required />
        </div>
        <div class="buttons-area">
          <button type="submit" id="login-btn" class="btn__ simple-purple-button" name="BtnEntrar">Confirmar</button>
          <a onclick="alterContainer()" id="link"><button id="to-create-btn" class="btn_ simple-white-button">Criar uma</button></a></small>
        </div>
      </form>
    </div>

    <div id="createAccount">
      <!-- Fomulário de Cadastro de Cliente -->
      <h1>Cadastrar-se</h1>
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
        <div class="buttons-area">
          <button type="submit" name="btnSalvar" class="btn__ simple-purple-button">Criar</button>
          <button onclick="alterContainer()" class="btn_ simple-white-button">já possuo conta</button>
        </div>
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
    }

    const mascaraTelefone = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g, '');
      value = value.replace(/(\d{2})(\d)/, "($1) $2");
      value = value.replace(/(\d)(\d{4})$/, "$1-$2");
      return value;
    }
  </script>
</body>

</html>

<?php //PHP do Login
if (isset($_POST['BtnEntrar'])) {
  $emailLogin = isset($_POST['emailLogin']) ? $_POST['emailLogin'] : null;
  $senhaLogin = isset($_POST['senhaLogin']) ? ($_POST['senhaLogin']) : null;

  $stmtFunc = $pdo->prepare("SELECT id_func, email_func, senha_func, nome_func, nivel_acesso FROM funcionario WHERE email_func = :email AND senha_func = :senha");

  $stmtFunc->bindParam(':email', $emailLogin);
  $stmtFunc->bindParam(':senha', $senhaLogin);
  $stmtFunc->execute();

  if ($stmtFunc->rowCount() > 0) {
    $resultLogin = $stmtFunc->fetch(PDO::FETCH_ASSOC);
    echo "<script>location.href='index.php'</script>";
    $_SESSION['user'] = $resultLogin['nome_func'];
    $_SESSION['email'] = $resultLogin['email_func'];
    $_SESSION['id_user'] = $resultLogin['id_func'];
    $_SESSION['acesso'] = $resultLogin['nivel_acesso'];
    exit;
  } else {
    $stmtCli = $pdo->prepare("SELECT id_cli, email_cli, senha_cli, nome_cli FROM cliente WHERE email_cli = :email AND senha_cli = :senha");

    $stmtCli->bindParam(':email', $emailLogin);
    $stmtCli->bindParam(':senha', $senhaLogin);
    $stmtCli->execute();

    if ($stmtCli->rowCount() > 0) {
      $resultLogin = $stmtCli->fetch(PDO::FETCH_ASSOC);
      echo "<script>location.href='index.php'</script>";
      $_SESSION['user'] = $resultLogin['nome_cli'];
      $_SESSION['email'] = $resultLogin['email_cli'];
      $_SESSION['id_user'] = $resultLogin['id_cli'];
      exit;
    } else {
      echo "<script>alert('Usuário ou senha não são válidos.');/script>";
    }
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

  $sql = "INSERT INTO cliente (nome_cli, tel_cli, end_cli, dt_nasc_cli, email_cli, senha_cli) VALUES (:n, :t, :en, :d, :e, :s);";

  $stmt = $pdo->prepare($sql);  //preparando o sql para receber os dados

  //troca dos dados pelo que esta vindo no formulário
  $stmt->bindParam(':n', $nome);
  $stmt->bindParam(':t', $telefone);
  $stmt->bindParam(':e', $email);
  $stmt->bindParam(':s', $senha);
  $stmt->bindParam(':d', $datanasc);
  $stmt->bindParam(':en', $endereco);

  if ($stmt->execute()) {
    header("location: index.php");
    echo "<script>alert('Cadastro Realizado');</script>";
  }
}
?>