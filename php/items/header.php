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
        <li id="icon-option">
          <h5 class="text">olá, <?php echo ($_SESSION['user']) ?><i class="fa-solid fa-bars fa-xl" id="menubar"></i></h5>
        </li>
    <?php }; ?>
  </div>
</div>
<div id="cover-menubar" class="hide"></div>
  <div id="side-menubar" class="hide">
    <i class="fa-solid fa-arrow-right fa-xl" id="close-menu"></i>
    <ul class="menu-itens top-item">
      <li><i class="fa-solid fa-user"></i>Minha conta</li>
      
    </ul>

    <ul class="menu-itens bottom-item">
    <?php if (isset($_SESSION['acesso'])) {?><li><a href="../pages/adminClientes.php" class="text"><i class="fa-solid fa-table"></i></i>Admininistrador</a></li> <?php } ?>
      <li id="out"><a href="../items/logOut.php" class="text"><i class="fa-solid fa-power-off"></i>Sair da conta</a></li>
    </ul>
  </div>
<script>
  // modal sidebar //
  const modalSidebar = document.getElementById('side-menubar');
  const openSidebar = document.getElementById('menubar');
  const closeSidebar = document.getElementById('close-menu');
  const fadeSidebar = document.getElementById('cover-menubar');

  const toggleModalSidebar = () => {
    [fadeSidebar, modalSidebar].forEach((el) => el.classList.toggle("hide"));
  }
  [openSidebar, closeSidebar, fadeSidebar].forEach((el) => {
    el.addEventListener('click', () => toggleModalSidebar());
  });
</script>