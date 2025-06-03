<?php
require_once '../Config/Conexao.php';
require_once '../classes/alimento.class.php';

$alimentos = Alimento::listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Refeição - Nutribem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Cadastrar Nova Refeição</h2>
  <form action="salvar_refeicao.php" method="post">

    <div class="mb-3">
      <label for="tipo" class="form-label">Tipo da Refeição</label>
      <select name="tipo" id="tipo" class="form-select" required>
        <option value="">Selecione</option>
        <option value="Café da Manhã">Café da Manhã</option>
        <option value="Almoço">Almoço</option>
        <option value="Lanche">Lanche</option>
        <option value="Jantar">Jantar</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="alimento_id" class="form-label">Alimento</label>
      <select name="alimento_id" id="alimento_id" class="form-select" required>
        <option value="">Selecione o alimento</option>
        <?php foreach ($alimentos as $alimento): ?>
          <option value="<?= $alimento['id'] ?>">
            <?= htmlspecialchars($alimento['nome']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="quantidade" class="form-label">Quantidade (em gramas)</label>
      <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
    </div>

    <button type="submit" class="btn btn-success">Salvar Refeição</button>
    <a href="../index.php" class="btn btn-secondary">Voltar</a>
  </form>
</div>
</body>
</html>
