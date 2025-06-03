<?php
require_once '../Config/Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tipo = $_POST['tipo'] ?? '';
  $alimento_id = $_POST['alimento_id'] ?? '';
  $quantidade = $_POST['quantidade'] ?? 0;

  // Verifica se os campos estão preenchidos corretamente
  if (empty($tipo) || empty($alimento_id) || $quantidade <= 0) {
    die('Dados inválidos. Volte e tente novamente.');
  }

  // Conecta ao banco
  $pdo = Conexao::getConexao();

  // Busca os dados nutricionais do alimento (por 100g)
  $stmt = $pdo->prepare("SELECT nome, proteina, carboidrato, gordura, calorias FROM alimentos WHERE id = ?");
  $stmt->execute([$alimento_id]);
  $alimento = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$alimento) {
    die('Alimento não encontrado.');
  }

  // Calcula os nutrientes com base na quantidade informada
  $fator = $quantidade / 100;
  $proteina = $alimento['proteina'] * $fator;
  $carboidrato = $alimento['carboidrato'] * $fator;
  $gordura = $alimento['gordura'] * $fator;
  $calorias = $alimento['calorias'] * $fator;

  // Insere a refeição no banco
  $stmt = $pdo->prepare("INSERT INTO refeicao (descricao, proteina, carboidrato, gordura, calorias) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$tipo, $proteina, $carboidrato, $gordura, $calorias]);

  // Redireciona para o dashboard
  header("Location: ../index.php");
  exit;
} else {
  echo "Método inválido.";
}
?>