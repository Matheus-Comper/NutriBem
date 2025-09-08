<?php
require_once(__DIR__ . '/../Config/Conexao.php');


class Usuario {
  private $nome;
  private $email;
  private $senha;
  private $dataNasc;
  private $sexo;
  private $foto;

  public function __construct($nome = null, $email = null, $senha = null, $dataNasc = null, $sexo = null, $foto = null) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->dataNasc = $dataNasc;
    $this->sexo = $sexo;
    $this->foto = $foto;
}

  public function setFoto($foto) {
    $this->foto = $foto;
  }
  public function getFoto() {
      return $this->foto;
  }


  public function salvar() {
    $pdo = Conexao::getConexao();
  
    
    $senhaCriptografada = password_hash($this->senha, PASSWORD_DEFAULT);
  
    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, sexo) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->nome,
      $this->email,
      $senhaCriptografada, 
      $this->dataNasc,
      $this->sexo,
      $this->foto
    ]);
  }

  public static function listarTodas() {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function buscarPorEmail($email) {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function atualizar($dados, $emailAntigo) {
    $pdo = Conexao::getConexao();

    $sql = "UPDATE usuarios SET 
                nome = ?, 
                dataNasc = ?, 
                sexo = ?, 
                email = ?, 
                meta_calorias = ?, 
                meta_proteina = ?, 
                meta_carboidrato = ?, 
                meta_gordura = ?" .
                ($this->foto ? ", foto = :foto" : "") . "
                WHERE email = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $dados['nome'],
        $dados['data_nasc'],
        $dados['sexo'],
        $dados['email'],
        $dados['meta_calorias'],
        $dados['meta_proteina'],
        $dados['meta_carboidrato'],
        $dados['meta_gordura'],
        $emailAntigo // WHERE
    ]);
}


}
?>