<?php
  session_start();
  session_destroy();
  header("Location: Crud/cadastro.php"); // Ou coloque o caminho da sua tela de cadastro
  exit;
?>