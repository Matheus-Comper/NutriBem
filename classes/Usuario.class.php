<?php
require_once(__DIR__ . '/../Config/Conexao.php');

class Usuario {
  private $id;
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

  // Getters e setters básicos
  public function setId($id) { $this->id = $id; }
  public function getId() { return $this->id; }

  public function setNome($nome) { $this->nome = $nome; }
  public function getNome() { return $this->nome; }

  public function setEmail($email) { $this->email = $email; }
  public function getEmail() { return $this->email; }

  public function setSenha($senha) { $this->senha = $senha; }
  public function getSenha() { return $this->senha; }

  public function setDataNasc($dataNasc) { $this->dataNasc = $dataNasc; }
  public function getDataNasc() { return $this->dataNasc; }

  public function setSexo($sexo) { $this->sexo = $sexo; }
  public function getSexo() { return $this->sexo; }

  public function setFoto($foto) { $this->foto = $foto; }
  public function getFoto() { return $this->foto; }

  // -------- SALVAR --------
  public function salvar() {
    $pdo = Conexao::getConexao();
    $senhaCriptografada = password_hash($this->senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, sexo, foto) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $this->nome,
      $this->email,
      $senhaCriptografada, 
      $this->dataNasc,
      $this->sexo,
      $this->foto ?? 'assets/img/user.png'
    ]);
  }

  // -------- LISTAR --------
  public static function listarTodas() {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // -------- BUSCAR --------
  public static function buscarPorEmail($email) {
    $pdo = Conexao::getConexao();
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // -------- ATUALIZAR --------
  public function atualizar($emailAntigo) {
    $pdo = Conexao::getConexao();

    $sql = "UPDATE usuarios SET 
                nome = ?, 
                dataNasc = ?, 
                sexo = ?, 
                email = ?, 
                meta_calorias = ?, 
                meta_proteina = ?, 
                meta_carboidrato = ?, 
                meta_gordura = ?";

    if ($this->foto) {
      $sql .= ", foto = ?";
    }

    $sql .= " WHERE email = ?";

    $params = [
      $this->nome,
      $this->dataNasc,
      $this->sexo,
      $this->email,
      $this->meta_calorias ?? 0,
      $this->meta_proteina ?? 0,
      $this->meta_carboidrato ?? 0,
      $this->meta_gordura ?? 0,
    ];

    if ($this->foto) {
      $params[] = $this->foto;
    }

    $params[] = $emailAntigo;

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($params);
  }

  // -------- SET METAS --------
  public function setMetaCalorias($v) { $this->meta_calorias = $v; }
  public function setMetaProteina($v) { $this->meta_proteina = $v; }
  public function setMetaCarboidrato($v) { $this->meta_carboidrato = $v; }
  public function setMetaGordura($v) { $this->meta_gordura = $v; }

}
?>
