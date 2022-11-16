<div id="header">
  <!-- Header -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
      <a class="navbar-brand" href="index.php">
        LOGO
      </a>

      <?php if (!isset($_SESSION['user'])) { ?>
        <a class="btn_" href="./loginPage.php">Entrar</a>
      <?php } else { ?>
        
        <div id="userArea">
          <h5 class="text">olá, <?php echo ($_SESSION['user']) ?> | </h5>
          <a href="../items/logOut.php" class="text">
            <h5>sair</h5>
          </a>
        </div>
      <?php }; ?>
    </nav>
  </div>
</div>