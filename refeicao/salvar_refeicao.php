<?php
require_once '../Config/Conexao.php';
require_once '../classes/Alimento.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tipo = $_POST['refeicao'];
  $alimento_id = $_POST['alimento_id'];
  $quantidade = $_POST['quantidade']; // em gramas

  if (!$tipo || !$alimento_id || !$quantidade) {
    die("Erro: Dados incompletos.");
  }

  try {
    $conn = Conexao::getConexao();

    // Buscar alimento no banco
    $stmt = $conn->prepare("SELECT * FROM alimentos WHERE id = ?");
    $stmt->execute([$alimento_id]);
    $alimento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$alimento) {
      die("Erro: Alimento não encontrado.");
    }

    // Cálculo dos nutrientes de acordo com a quantidade informada
    $fator = $quantidade / 100; // Supondo que os valores nutricionais são por 100g
    $proteina = $alimento['proteina'] * $fator;
    $carboidrato = $alimento['carboidrato'] * $fator;
    $gordura = $alimento['gordura'] * $fator;
    $calorias = $alimento['calorias'] * $fator;

    // Inserir a refeição com todos os dados
    $stmt2 = $conn->prepare("INSERT INTO refeicao (tipo, quantidade, proteina, carboidrato, gordura, calorias) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt2->execute([
      $tipo,
      $quantidade,
      $proteina,
      $carboidrato,
      $gordura,
      $calorias
    ]);

    header("Location: ../index.php");
    exit;

  } catch (PDOException $e) {
    die("Erro no banco: " . $e->getMessage());
  }
}
?>
