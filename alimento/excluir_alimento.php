<?php
require_once ('../Config/Conexao.php');
require_once("../autoload.php");

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  Alimento::excluir($id);
}

header('Location: ../index.php');
exit;
?>