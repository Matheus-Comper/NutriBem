<?php
session_start();
require_once '../Config/Conexao.php';
require_once '../autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuario = Usuario::buscarPorEmail($email);

    if ($usuario) {
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: ../index.php");
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email não encontrado!'); window.location.href='login.php';</script>";
    }
}