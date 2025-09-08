<?php
  session_start();
  session_destroy();
  header("Location: ../index.html"); // Ou coloque o caminho da sua tela de cadastro
  exit;
?>