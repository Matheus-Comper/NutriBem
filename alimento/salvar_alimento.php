<?php
require_once '../Config/Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdo = Conexao::getConexao();

  $stmt = $pdo->prepare("INSERT INTO alimentos (nome, proteina, carboidrato, gordura, calorias) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([
    $_POST['nome'],
    $_POST['proteina'],
    $_POST['carboidrato'],
    $_POST['gordura'],
    $_POST['calorias']
  ]);

  header("Location: ../index.php");
  exit;
}
?>