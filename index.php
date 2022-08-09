<?php
session_start();
require_once "conexao.php";
$pdo = conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SistemaAgendamento</title>
    <!--IMPORTANDO ICONS-->
    <script src="https://kit.fontawesome.com/52e3096c6b.js" crossorigin="anonymous"></script>

    <!--IMPORTANDO FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Gantari:wght@100;300;500&family=Lobster&family=Passion+One:wght@400;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!--IMPORTANDO CSS-->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--HEADER-->
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    LOGO
                </a>
                <div class="justify-content-end nav-buttons">
                    <button class="btn_ btn-1 button-mobile" data-toggle="modal" data-target="#loginModal">entrar</button>
                    <button 
                        class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#navbarNavAlt" 
                        aria-controls="navbarNavAlt" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation"
                    >
                    <span class="navbar-toggler-icon"></span>
                </div>
                </button>
                <div class="collapse navbar-collapse flex-column" id="navbarNavAlt">
                    <ul class="navbar nav flex-none">
                        <li class="nav-item"><a href="#footer" class="nav-link active">Contato</a></li>
                        <li class="nav-item"><a href="#content-2" class="nav-link active">Serviços</a></li>
                        <li class="nav-item"><a href="#content-3" class="nav-link active">Nossa Equipe</a></li>
                        <li class="nav-item"><a href="#content-4" class="nav-link active">Localização</a></li>
                    </ul>
                </div>
                <button class="btn_ button-desktop" data-toggle="modal" data-target="#loginModal">entrar</button>
            </nav>
        </div>
    </div>
    <!--//HEADER-->
    <!--LANDING-->
    <div id="content-1">
        <img src="assets/girlpose2.png" id="girl">
        <div id="description">
            <img src="assets/clock.png" id="clock">
            <img src="assets/day.png" id="day">
            <h2>Agendamento</h2>
            <h1>Espaço Kelly Silvestre</h1>
            <p>Para economizar o seu tempo e descomplicar o agendamento utilize nosso sistema, em <span class="underline">menos de 5 minutos</span> o agendamento é finalizado.</p>
            <div class="go-to">
                <a href="#">Agendar</a> <i class="fa-solid fa-arrow-right fa-xl"></i>
            </div>
        </div>
    </div>
    <!--//LANDING-->
    <!--EQUIPE-->
    <div id="content-3">
        <h2>NOSSA EQUIPE</h2>
        <div id="team">
            <div class="card">
                <img src="./assets/func1.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title w-100">Amanda Taborda</h5>
                    <p>Manicure</p>
                    <p>Pedicure</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/func2.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title w-100">Ana Maria</h5>
                    <p>Manicure</p>
                    <p>Pedicure</p>
                    <p>Cabeleleira</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/func3.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title w-100">Andressa Alves</h5>
                    <p>Estilista de cílios</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/func4.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title w-100">Claudia Silva</h5>
                    <p>Esteticista</p>
                </div>
            </div>
        </div>
    </div>
    <!--//EQUIPE-->
    <!--SERVIÇOS-->
    <div id="content-2">
        
        <h2>SERVIÇOS DO ESPAÇO</h2>
        <div id="list">
              <div class="card secundary">
                <div class="card-body">
                    <h5 class="card-title">UNHAS</h5>
                    <p>Manicure</p>
                    <p>Pedicure</p>
                    <p>Pé e mão</p>
                    <div class="plus">
                        <h5 class="card-title">Adicionais</h5>
                        <p>Decoração com joias</p>
                        <p>Decoração com adesivos</p>
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ALONGAMENTOS DE UNHA</h5>
                  <p>Tradicional</p>
                  <p>Baby boomer</p>
                  <p>encapsulada</p>
                  <p>Francesa reversa</p>
                  <p>Blindagem</p>
                  <p>Banho de Cristal</p>
                  <p>Manutenção</p>
                  <div class="plus">
                    <h5 class="card-title">Esmaltação</h5>
                    <p>Em gel</p>
                    <p>Tradicional</p>
                  </div>
                </div>
              </div>
              <div class="card secundary">
                <div class="card-body">
                    <h5 class="card-title">CABELO</h5>
                    <p>Escova</p>
                    <p>Corte</p>
                    <p>Tintura</p>
                    <p>Progressiva</p>
                    <p>Luzes</p>
                    <p>Penteado</p>
                </div>
              </div>
        </div>
    </div>
    <!--//SERVIÇOS-->
    <!--LOCAL-->
    <div id="content-4">
        <h2>ONDE NOS ESNCONTRAR</h2>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.420882736537!2d-53.4629567!3d-24.951791099999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d40efa5034f7%3A0xbd8d72a090da37bd!2sR.%20Recife%2C%20570%20-%20Centro%2C%20Cascavel%20-%20PR%2C%2085810-030!5e0!3m2!1spt-BR!2sbr!4v1659834882666!5m2!1spt-BR!2sbr" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
    <!--//LOCAL-->
    <!--REMEMBER-->
    <div id="content-5">
        <div id="remember">
            <h1>Faça já seu agendamento</h1>
            <p>em menos de 5 minutos</p>
            <button>Vamos lá!</button>
        </div>
    </div>
    <!--//REMEMBER-->
    <!--FOOTER-->
    <footer>
        <div id="footer">
            <div class="social">
              <i class="fa-brands fa-instagram fa-2xl"></i>
              <i class="fa-brands fa-whatsapp fa-2xl"></i>
              <i class="fa-brands fa-facebook fa-2xl"></i>
            </div>
            <p class="copy justify-center">&copy; Kaoê Henrique e Gabriel Salvador. Todos os direitos reservados</p>
        </div>
    </footer>
    <!--//FOOTER-->
    <!--MODAL LOGIN-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="loginContent">
                <div class="modal-header">
                    <h2 class="modal-title">Login</h2>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="usuario" placeholder="Insira seu Email" required/>
                        </div>
                        <div class="form-group">
                          <label for="pass">Senha</label>
                          <input type="password" class="form-control" id="pass" name="senhaa" placeholder="Senha" required/>
                          <a href="#" id="passHelp" class="form-text text-muted">Esqueceu sua senha?</a>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check" id="check">
                            <label for="check" id="label-check">Manter conectado?</label>
                        </div>
                        <button type="submit" class="btn__" name="BtnEntrar">Confirmar</button>
                        <small  class="form-text text-muted text-center">Não possui uma conta? <a href="#createAccountModal" data-toggle="modal">Crie uma</a></small>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!--//MODAL LOGIN-->
    <!--MODAL CADASTRO-->
    <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="createAccountContent">
                <div class="modal-header">
                    <h2 class="modal-title">Cadastrar</h2>
                </div>
                <div class="modal-body">
                    <form method="POST">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="nome" placeholder="Insira seu Nome" required/>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                              <label for="contact">Data de Nascimento</label>
                              <input type="date" class="form-control" id="date" name="datanasc"placeholder="Insira Sua data de nascimento" required/>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="contact">Telefone</label>
                            <input type="text" class="form-control" id="contact" name="telefone" placeholder="Telefone para contato" required/>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="contact">Endereço</label>
                            <input type="text" class="form-control" id="endereço" name="endereco"placeholder="Insira seu endereço" required/>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu Email" required/>
                          </div>
                        </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="pass">Senha</label>
                              <input type="password" class="form-control" id="pass" name="senha"placeholder="Crie uma senha" required/>
                              <small class="text-form text-muted">Você deverá se lembrar depois</small>
                            </div>
                          </div>
                        </div>
        
                        <button type="submit" name="btnSalvar"class="btn__">Criar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!--//MODAL CADASTRO-->
    <!--IMPORTANDO JS-->
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/poopper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

//CADASTRO DO FORMULARIO

     if(isset($_POST['btnSalvar'])) {
    $nome = isset($_POST['nome'])? $_POST['nome'] : null;
    $telefone = isset($_POST['telefone'])? $_POST['telefone'] : null;
    $email = isset($_POST['email'])? $_POST['email'] : null;
    $senha = isset($_POST['senha'])? $_POST['senha'] : null;
    $datanasc = isset($_POST['datanasc'])? $_POST['datanasc'] : null;
    $endereco = isset($_POST['endereco'])? $_POST['endereco'] : null;

   $sql = "INSERT INTO cliente (nome_cliente, telefone_cliente, email_cliente, senha_cliente, data_nasc, endereco_cliente) VALUES (:n, :t, :e, :s, :d, :en);";
     //preparando o sql para receber os dados
    $stmt = $pdo->prepare($sql);
     //troca dos dados pelo que esta vindo no formulário
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':t', $telefone);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':s', $senha);
    $stmt->bindParam(':d', $datanasc);
    $stmt->bindParam(':en', $endereco);
    if ($stmt->execute()) {
        echo "Registro inserido com sucesso";
    }
     }
//LOGIN FUNCIONAL 
     if (isset($_POST['BtnEntrar'])) {
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
        $senhaa = isset($_POST['senhaa']) ? ($_POST['senhaa']) : null;
    
        if(empty($usuario) && empty($senhaa)){
           echo "Necessário informar usuario e senha";
         exit();
        }
        
       $sql2 = "SELECT email_cliente, senha_cliente, nome_cliente FROM cliente WHERE email_cliente = :u AND senha_cliente = :ss";
    
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':u', $usuario);
        $stmt2->bindParam(':ss', $senhaa);
      $stmt2->execute();
       $user = $stmt2->fetch();
        if($stmt2->rowCount()> 0){
           echo "Seja bem vindo"." ". $usuario;
        }else{
            echo "Usuário ou senha invalidos";
            exit();
       }
}
?> 