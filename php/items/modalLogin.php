<div class="modal fade" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="loginContent">
      <div class="modal-header">
        <h2 class="modal-title">Login</h2>
        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
    	</div>
    	<div class="modal-body">
        <form method="POST">
        	<div class="form-group">
        		<label for="emailLogin">Email</label>
          	<input type="email" class="form-control" id="emailLogin" name="emailLogin" placeholder="Insira seu Email" required onchange="emailValidate()"/>
      		</div>
        	<div class="form-group">
          	<label for="pass">Senha</label>
          	<input type="password" class="form-control" id="passLogin" name="senhaLogin" placeholder="Senha" required/>
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
  $emailLogin = isset($_POST['emailLogin']) ? $_POST['emailLogin'] : null;
  $senhaLogin = isset($_POST['senhaLogin']) ? ($_POST['senhaLogin']) : null;
    
  $sql2 = "SELECT email_cliente, senha_cliente, nome_cliente FROM cliente WHERE email_cliente = :email AND senha_cliente = :senha";

  $stmt2 = $pdo->prepare($sql2);
  $stmt2->bindParam(':email', $emailLogin);
  $stmt2->bindParam(':senha', $senhaLogin);
	
  $stmt2->execute();

  if($stmt2->rowCount()> 0){
		$_SESSION['user'] = $emailLogin;
		exit();
  } else {
    echo "<p>Usuário ou senha invalidos</p>";
    exit();
   }
}
?> 