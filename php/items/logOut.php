<?php 
session_start();
session_destroy();
header("location: ../pages/index.php");
exit;
?>