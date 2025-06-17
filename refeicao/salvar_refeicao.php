<?php
require_once '../Config/Conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tipo = $_POST['tipo'] ?? '';
  $alimentosJson = $_POST['alimentos'] ?? '';
  $alimentos = json_decode($alimentosJson, true);

  if (empty($tipo) || empty($alimentos) || !is_array($alimentos)) {
    die('Dados inválidos. Volte e tente novamente.');
  }


  $pdo = Conexao::getConexao();

  foreach ($alimentos as $item) {
    $alimento_id = $item['id'];
    $quantidade = $item['quantidade'];

    // Pega os dados do alimento
    $stmt = $pdo->prepare("SELECT nome, proteina, carboidrato, gordura, calorias FROM alimentos WHERE id = ?");
    $stmt->execute([$alimento_id]);
    $alimento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$alimento) {
      continue; // pula se não encontrou
    }

    $fator = $quantidade / 100;
    $proteina = $alimento['proteina'] * $fator;
    $carboidrato = $alimento['carboidrato'] * $fator;
    $gordura = $alimento['gordura'] * $fator;
    $calorias = $alimento['calorias'] * $fator;

    $stmt = $pdo->prepare("INSERT INTO refeicao (descricao, proteina, carboidrato, gordura, calorias) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$tipo, $proteina, $carboidrato, $gordura, $calorias]);
  }
  header("Location: ../index.php");
  exit;
} else {
  echo "Método inválido.";
}

?>