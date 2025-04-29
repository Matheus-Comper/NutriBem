<?php

    require_once("Login.class.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = isset($_POST['id'])?$_POST['id']:0;
        $nome = isset($_POST['nome'])?$_POST['nome']:"";
        $email = isset($_POST['email'])?$_POST['email']:0;
        $senha = isset($_POST['senha'])?$_POST['senha']:"";
        $dataNasc = isset($_POST['dataNasc'])?$_POST['dataNasc']:"";
        

        $login = new Usuario($id, $nome, $email, $senha, $dataNasc);

        if($acao == "salvar"){
            if($id > 0){
                $resultado = $login->alterar();
            } else {
                $resultado = $login->inserir();
            }
        } else 
            $resultado = $login->excluir();
        

        if($resultado){
            header('Location: index.php');
        } else {
            echo "Erro ao salvar dados: ". $login;
        }
    } else if($_SERVER['REQUEST_METHOD'] == 'GET'){

        
        $id = isset($_GET['id'])?$_GET['id']:0;
        $resultado = Usuario::listar(1, $id);
        if($resultado)
            $login = $resultado[0];
        
        $busca = isset($_GET['busca'])?$_GET['busca']:0;
        $tipo = isset($_GET['tipo'])?$_GET['tipo']:0;

        
        $lista = Usuario::listar($tipo, $busca); 


    }
?>