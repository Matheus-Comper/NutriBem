<?php
require_once ('../Config/Conexao.php');
require_once ('../classes/refeicao.class.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  Refeicao::excluir($id);
}

header('Location: ../index.php');
exit;
?>