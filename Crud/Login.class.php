<?php

  include 'Database.class.php';

  class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dataNasc;

    public function __construct($id, $nome, $email, $senha, $dataNasc){
      $this->id = $id;
      $this->nome = $nome;
      $this->email = $email;
      $this->senha = $senha;
      $this->dataNasc = $dataNasc;
    }

    public function setId($id){
      if($id == ''){
        throw new Exception("Error");
      }
      else {
        $this->id = $id;
      }
    }

    public function setNome($nome){
      if($nome == ''){
        throw new Exception("Error");
      }
      else {
        $this->nome = $nome;
      }
    }

    public function setEmail($email){
      if($email == ''){
        throw new Exception("Error");
      }
      else {
        $this->email = $email;
      }
    }

    public function setSenha($senha){
      if($senha == ''){
        throw new Exception("Error");
      }
      else {
        $this->senha = $senha;
      }
    }

    public function setDataNasc($dataNasc){
        if($dataNasc == ''){
          throw new Exception("Error");
        }
        else {
          $this->dataNasc = $dataNasc;
        }
      }

    public function getId(): int{
      return $this->id;
    }

    public function getNome(): String{
      return $this->nome;
    }

    public function getEmail(): int{
      return $this->email;
    }
    public function getSenha(): String{
      return $this->senha;
    }
    public function getDataNasc(): String{
        return $this->dataNasc;
      }

    public function __toString():String{
      $str = "Login: $this->id - $this->nome - Email: $this->email - Senha: $this->anexo - Data de nascimento: $this->dataNasc";

      return $str;
    }

    public function inserir():Bool {
      

      //montar o sql
      $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc) VALUES(:nome, :email, :senha, :dataNasc)";
      
      $parametros = array(
                    ':nome', $this->getNome(),
                    ':email', $this->getEmail(),
                    ':senha', $this->getSenha(),
                    ':dataNasc', $this->getDataNasc());

      //executar o comando
      
      return Database::executar($sql, $parametros);
    }

    public static function listar($tipo=0, $info=''): Array {
      
      $sql = "SELECT * FROM usuarios";
      if($tipo > 0){
        switch($tipo){
          case 1: $sql .= " WHERE id = :info ORDER BY id"; break; // filtro por id
          case 2: $sql .= " WHERE nome like :info ORDER BY nome"; $info = '%'.$info.'%'; break; // filtro por descrição
        }
      }

      $parametros = array();
      if ($tipo > 0){
        $parametros = [':info'=>$info];
      }
      //executar o comando
      $comando = Database::executar($sql, $parametros);
      $resultado = $comando->fetchAll();
      return $resultado;
    }

    public function alterar(): Bool {
      
      $sql = "UPDATE usuarios
                 SET descricao = :descricao,
                     peso = :peso,
                     anexo = :anexo
               WHERE id = :id";

      $parametros = array(
          ':id', $this->getId(),
          ':descricao', $this->getDescricao(),
          ':peso', $this->getPeso(),
          ':anexo', $this->getAnexo());

      return Database::executar($sql, $parametros);
    }

    public function excluir(): Bool {
      // return true;
      //abrir conexao
      $conexao = new PDO(DSN, USUARIO, SENHA);

      //montar o sql
      $sql = "DELETE FROM usuarios
                    WHERE id = :id"; 

      //preparou comando
      $comando = $conexao->prepare($sql);
      
      //vincula valores
      $comando->bindValue(':id', $this->getId());
    
      return $comando->execute();
    }
  } 
  
?>