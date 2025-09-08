<?php
session_start();
require_once '../Config/Conexao.php';
require_once("../autoload.php");

$emailAntigo = $_SESSION['usuario_email'];

$dados = [
  'nome' => $_POST['nome'],
  'email' => $_POST['email'],
  'data_nasc' => $_POST['data_nasc'],
  'sexo' => $_POST['sexo'],
  'meta_calorias' => $_POST['meta_calorias'],
  'meta_proteina' => $_POST['meta_proteina'],
  'meta_carboidrato' => $_POST['meta_carboidrato'],
  'meta_gordura' => $_POST['meta_gordura'],
];

Usuario::atualizar($dados, $emailAntigo);
$_SESSION['usuario_email'] = $dados['email'];

header("Location: ../principal.php");
exit;
?>

