<?php
require_once(__DIR__ . '/../Config/Conexao.php');

class Refeicao {
  public $tipo;
  public $descricao;
  public $proteina;
  public $carboidrato;
  public $gordura;
  public $calorias;


  public function __construct($tipo = '', $descricao = '', $proteina = 0, $carboidrato = 0, $gordura = 0, $calorias = 0, $quantidade = 0) {
    $this->tipo = $tipo;
    $this->descricao = $descricao;
    $this->proteina = $proteina;
    $this->carboidrato = $carboidrato;
    $this->gordura = $gordura;
    $this->calorias = $calorias;
    $this->quantidade = $quantidade;
  }

  public function salvar() {
    $pdo = Conexao::getConexao();
    $sql = "INSERT INTO refeicao (tipo, descricao, proteina, carboidrato, gordura, calorias, quantidade) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->tipo,
      $this->descricao,
      $this->proteina,
      $this->carboidrato,
      $this->gordura,
      $this->calorias,
      $this->quantidade
    ]);
  }

  public static function listarTodas() {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM refeicao ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function excluir($id) {
    $conn = Conexao::getConexao();
    $stmt = $conn->prepare("DELETE FROM refeicao WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

 public static function listarTodasComAlimentos() {
    $pdo = Conexao::getConexao();

    $stmt = $pdo->query("
        SELECT 
            id AS refeicao_id,
            tipo,
            descricao,
            quantidade,
            proteina,
            carboidrato,
            gordura,
            calorias
        FROM refeicao
    ");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  

}
?>