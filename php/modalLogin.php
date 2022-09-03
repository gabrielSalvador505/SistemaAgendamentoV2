<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="loginContent">
                <div class="modal-header">
                    <h2 class="modal-title">Login</h2>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                          <label for="emailLogin">Email</label>
                          <input type="email" class="form-control" id="emailLogin" name="usuario" placeholder="Insira seu Email" required/>
                        </div>
                        <div class="form-group">
                          <label for="pass">Senha</label>
                          <input type="password" class="form-control" id="passLogin" name="senhaa" placeholder="Senha" required/>
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
<?php 

if (isset($_POST['BtnEntrar'])) {
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
    $senhaa = isset($_POST['senhaa']) ? ($_POST['senhaa']) : null;

    if(empty($usuario) && empty($senhaa)){
     exit();
    }
    
   $sql2 = "SELECT email_cliente, senha_cliente, nome_cliente FROM cliente WHERE email_cliente = :u AND senha_cliente = :ss";

    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':u', $usuario);
    $stmt2->bindParam(':ss', $senhaa);
  $stmt2->execute();
   $user = $stmt2->fetch();
    if($stmt2->rowCount()> 0){
       echo "<p>Seja bem vindo"." ". $usuario."</p>";
    }else{
        echo "<p>Usuário ou senha invalidos</p>";
        exit();
   }
}
?>