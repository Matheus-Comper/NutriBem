<?php
require_once 'Config/Conexao.php';

class Refeicao {
  private $id;
  private $nome;
  private $email;
  private $senha;
  private $dataNasc;
  private $sexo;

  public function __construct( $nome, $email, $senha, $dataNasc, $sexo) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->dataNasc = $dataNasc;
  }

  public function salvar() {
    $pdo = Conexao::getConexao();
    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, sexo) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->nome,
      $this->email,
      $this->senha,
      $this->dataNasc,
      $this->sexo
    ]);
  }

  public static function listarTodas() {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>