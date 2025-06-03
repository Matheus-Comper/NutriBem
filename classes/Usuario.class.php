<?php
require_once '../Config/Conexao.php';

class Usuario {
  private $nome;
  private $email;
  private $senha;
  private $dataNasc;
  private $sexo;
  private $confirmSenha;

  public function __construct( $nome, $email, $senha, $confirmSenha) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->confirmSenha = $confirmSenha;
  }

  public function salvar() {
    $pdo = Conexao::getConexao();
    $sql = "INSERT INTO usuarios (nome, email, senha, confirmSenha) 
            VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->nome,
      $this->email,
      $this->senha,
      $this->confirmSenha
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