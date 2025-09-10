<?php
session_start();
require_once('../Config/Conexao.php');
require_once('../classes/Alimento.class.php');
require_once('../classes/Refeicao.class.php');
require_once('../classes/Usuario.class.php');

if (!isset($_SESSION['usuario_email'])) {
    header("Location: ../Crud/login.php");
    exit;
}

// Recebe dados do formulário
$usuario = Usuario::buscarPorEmail($_SESSION['usuario_email']);

$tipo       = $_POST['refeicao'] ?? '';
$alimentoId = $_POST['alimento_id'] ?? '';
$quantidade = $_POST['quantidade'] ?? 0;

if (!$tipo || !$alimentoId || !$quantidade) {
    die("Erro: Dados incompletos.");
}

// Busca o alimento
$alimento = Alimento::buscarPorId($alimentoId);
if (!$alimento) {
    die("Erro: Alimento não encontrado.");
}

// Calcula nutrientes com base na quantidade
$fator = $quantidade / 100;
$proteina    = $alimento['proteina'] * $fator;
$carboidrato = $alimento['carboidrato'] * $fator;
$gordura     = $alimento['gordura'] * $fator;
$calorias    = $alimento['calorias'] * $fator;

// Salva na tabela refeicao
$refeicao = new Refeicao($tipo, $alimento['nome'], $proteina, $carboidrato, $gordura, $calorias, $quantidade);
$refeicao->salvar();

// Redireciona de volta para principal
header("Location: ../principal.php");
exit;
