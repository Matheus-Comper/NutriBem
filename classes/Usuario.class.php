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
<<<<<<< HEAD
    $pdo = Conexao::getConexao();
    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, sexo) 
=======
    $pdo = Conexao::conectar();
    $sql = "INSERT INTO usuarios ( nome, email, senha, dataNasc, sexo, confirmSenha) 
>>>>>>> c22026e9a635b86f53f06c681548e514f9747d16
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
<<<<<<< HEAD
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
=======
    $pdo = Conexao::conectar();
    $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
>>>>>>> c22026e9a635b86f53f06c681548e514f9747d16
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>