<div id="header">
  <!-- Header -->
  <div id="container-header">
    <a class="logo" href="index.php">
      <img src="../../assets/logo.png" id="logo">
    </a>

    <?php if (!isset($_SESSION['user'])) { ?>
      <a class="btn_" href="./loginPage.php">Entrar</a>
    <?php } else { ?>
        <ul id="user">
          <li id="icon-option"><h5 class="text">olá, <?php echo ($_SESSION['user']) ?><i class="fa-solid fa-bars fa-xl" id="menu-bars" onclick="alterDisplay()"></i></h5>
          </li>
          <ul id="user-options" style="display: none;">
            <li><a href="" class="text">minha conta</a></li>
            <li><a href="../pages/adminClientes.php" class="text">administrador</a></li>
            <li><a href="../items/logOut.php" class="text">
                sair da conta
              </a></li>
          </ul>
        </ul>
    <?php }; ?>
  </div>
</div>
<script>
  function alterDisplay() {
    let div = document.getElementById('user-options');
    let icon = document.getElementById('menu-bars');
    if (div.style.display == 'none') {
      div.style.display = 'block';
    } else {
      div.style.display = 'none';
    }
  }
</script>