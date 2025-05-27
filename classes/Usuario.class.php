<?php
require_once 'Config/Conexao.php';

class Refeicao {
  private $nome;
  private $email;
  private $senha;
  private $dataNasc;
  private $sexo;
  private $confirmSenha;

  public function __construct( $nome, $email, $senha, $dataNasc, $sexo, $confirmSenha) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->dataNasc = $dataNasc;
    $this->sexo = $sexo;
    $this->confirmSenha = $confirmSenha;
  }

  public function salvar() {
    $pdo = Conexao::conectar();
    $sql = "INSERT INTO usuarios ( nome, email, senha, dataNasc, sexo, confirmSenha) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->nome,
      $this->email,
      $this->senha,
      $this->dataNasc,
      $this->sexo,
      $this->confirmSenha
    ]);
  }

  public static function listarTodas() {
    $pdo = Conexao::conectar();
    $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}