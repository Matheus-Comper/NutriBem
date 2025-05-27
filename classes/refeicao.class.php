<?php
require_once 'Config/Conexao.php';

class Refeicao {
  private $id;
  private $tipo;
  private $descricao;
  private $proteina;
  private $carboidrato;
  private $gordura;
  private $calorias;

  public function __construct( $tipo, $descricao, $proteina, $carboidrato, $gordura, $calorias) {
    $this->tipo = $tipo;
    $this->descricao = $descricao;
    $this->proteina = $proteina;
    $this->carboidrato = $carboidrato;
    $this->gordura = $gordura;
    $this->calorias = $calorias;
  }

  public function salvar() {
    $pdo = Conexao::conectar();
    $sql = "INSERT INTO refeicao (tipo, descricao, proteina, carboidrato, gordura, calorias) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->tipo,
      $this->descricao,
      $this->proteina,
      $this->carboidrato,
      $this->gordura,
      $this->calorias
    ]);
  }

  public static function listarTodas() {
    $pdo = Conexao::conectar();
    $sql = "SELECT * FROM refeicao ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}