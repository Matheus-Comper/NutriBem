<?php
require_once '../Config/Conexao.php';
require_once '../classes/Alimento.class.php';

$classificacoes = ['Café da manhã', 'Almoço', 'Jantar', 'Lanche', 'Pré-treino', 'Pós-treino'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Alimento | Nutribem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
    <header class="bg-success text-white border-bottom mb-4 py-3">
      <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4 m-0">NUTRIBEM</h1>
        <div class="dropdown">
          <button class="btn btn-light text-success dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Exercícios</a></li>
            <li><a class="dropdown-item" href="#">Relatório</a></li>
            <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
            <li><a class="dropdown-item" href="Crud/cadastro.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </header>
<body>
  <div class="container">
    <h2>Novo Alimento</h2>
    <form action="salvar_alimento.php" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome do alimento</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="classificacao" class="form-label">Classificação (refeição)</label>
        <select name="classificacao" id="classificacao" class="form-select" required>
          <option value="" selected disabled>Selecione</option>
          <?php foreach ($classificacoes as $c): ?>
            <option value="<?= $c ?>"><?= $c ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="proteina" class="form-label">Proteínas (por 100g)</label>
          <input type="number" step="0.01" name="proteina" id="proteina" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="carboidrato" class="form-label">Carboidratos (por 100g)</label>
          <input type="number" step="0.01" name="carboidrato" id="carboidrato" class="form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="gordura" class="form-label">Gorduras (por 100g)</label>
          <input type="number" step="0.01" name="gordura" id="gordura" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="calorias" class="form-label">Calorias (por 100g)</label>
          <input type="number" step="1" name="calorias" id="calorias" class="form-control" required>
        </div>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success">Salvar Alimento</button>
        <a href="../index.php" class="btn btn-outline-secondary">Voltar</a>
      </div>
    </form>
  </div>
</body>
</html>

