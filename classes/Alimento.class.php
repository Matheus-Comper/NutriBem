<?php
require_once(__DIR__ . '/../Config/Conexao.php');


class Alimento {
 public static function listarTodos() {
    $con = Conexao::getConexao();
    $sql = "SELECT * FROM alimentos ORDER BY nome ASC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public static function buscarPorId($id) {
    $pdo = Conexao::getConexao();
    $stmt = $pdo->prepare("SELECT * FROM alimentos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function excluir($id) {
    $conn = Conexao::getConexao();
    $stmt = $conn->prepare("DELETE FROM alimentos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
  
}
?>