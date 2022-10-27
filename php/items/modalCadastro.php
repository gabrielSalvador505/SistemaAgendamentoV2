<div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="createAccountContent">
      <div class="modal-header">
        <h2 class="modal-title">Cadastrar-se</h2>
        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" id="formRegister">
          <div class="row">
            <div class="col">
              <div class="form-group mx-0">
                <label for="name">Nome</label>
                <input type="text" class="form-control required" id="name" name="nome" placeholder="Seu nome completo" autocomplete="off" required onchange="nameValidate()"/>
                <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
              </div>
            </div>
            <div class="col">
              <div class="form-group mx-0">
                <label for="date">Data de Nascimento</label>
                <input type="date" class="form-control" id="date" name="datanasc" autocomplete="off" required/>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mx-0">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control required" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" autocomplete="off"  required onchange="phoneValidate()"/>
                <span class="span-required">Formato incompatível</span>
              </div>
            </div>
            <div class="col">
              <div class="form-group mx-0">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco"placeholder="Rua e número de sua casa" autocomplete="off" required/>
                <small class="text-form text-muted">Ex: Rua Visconde de Guarapuava, 248</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group mx-0">
                <label for="email">Email</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Insira seu Email" required onchange="emailValidate()"/>
                <span class="span-required">Formato incompatível</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group mx-0">
                <label for="pass">Senha</label>
                <input type="password" class="form-control required" id="pass" name="senha"placeholder="Crie uma senha" autocomplete="off" required onchange="passValidate()"/>
                <span class="span-required">No mínimo 8 caracteres</span>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group mx-0">
                <label for="pass">Confirme sua senha</label>
                <input type="password" class="form-control required" id="confpass" name="confsenha"placeholder="Confirme dua senha" autocomplete="off" required onchange="passConfirm()"/>
                <span class="span-required">Senhas não conferem</span>
              </div>
            </div>
          </div>
          <button type="submit" name="btnSalvar"class="btn__">Criar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
 
if(isset($_POST['btnSalvar'])) {
  $nome = isset($_POST['nome'])? $_POST['nome'] : null;
  $telefone = isset($_POST['telefone'])? $_POST['telefone'] : null;
  $email = isset($_POST['email'])? $_POST['email'] : null;
  $senha = isset($_POST['senha'])? $_POST['senha'] : null;
  $datanasc = isset($_POST['datanasc'])? $_POST['datanasc'] : null;
  $endereco = isset($_POST['endereco'])? $_POST['endereco'] : null;

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
      echo "";
    }
    }
?>