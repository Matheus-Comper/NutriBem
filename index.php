<?php
require_once 'Config/Conexao.php';
require_once 'classes/refeicao.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $refeicao = new Refeicao(
    $_POST['tipo'],
    $_POST['descricao'],
    $_POST['proteina'],
    $_POST['carboidrato'],
    $_POST['gordura'],
    $_POST['calorias']
  );
  $refeicao->salvar();
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

$refeicoes = Refeicao::listarTodas();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutribem Home</title>
  <link rel="stylesheet" href="css/index.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header>
    <center><strong>NUTRIBEM</strong></center>
    <nav>
      <div class="btn-group">
        <button type="button" class="btn btn-secondary">Menu</button>
        <button type="button" class="btn btn-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Exercícios</a></li>
        <li><a class="dropdown-item" href="#">Relatório</a></li>
        <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
      </ul>
      </div>
    </nav>
  </header>

  <div class="container dashboard">
    <h2>Resumo do seu dia</h2>

    <form method="POST" class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Tipo de Refeição:</label>
        <select name="tipo" class="form-select" required>
          <option value="Café da manhã">Café da manhã</option>
          <option value="Almoço">Almoço</option>
          <option value="Lanche">Lanche</option>
          <option value="Jantar">Jantar</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Descrição:</label>
        <input type="text" name="descricao" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Proteína (g):</label>
        <input type="number" name="proteina" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Carboidrato (g):</label>
        <input type="number" name="carboidrato" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Gordura (g):</label>
        <input type="number" name="gordura" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Calorias (kcal):</label>
        <input type="number" name="calorias" class="form-control" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success">Cadastrar Refeição</button>
      </div>
    </form>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Refeições do Dia</div>
          <div class="card-body">
            <?php foreach ($refeicoes as $r): ?>
              <div class="mb-3">
                <strong><?= htmlspecialchars($r['tipo']) ?>:</strong> <?= htmlspecialchars($r['descricao']) ?>
                <table class="table table-sm table-bordered mt-2">
                  <thead class="table-light">
                    <tr><th>Proteína</th><th>Carboidrato</th><th>Gordura</th><th>Calorias</th></tr>
                  </thead>
                  <tbody>
                    <tr><td><?= $r['proteina'] ?>g</td><td><?= $r['carboidrato'] ?>g</td><td><?= $r['gordura'] ?>g</td><td><?= $r['calorias'] ?> kcal</td></tr>
                  </tbody>
                </table>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-outline-success">Editar</button>
                  <button class="btn btn-sm btn-outline-primary">Expandir</button>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Consumo de Calorias</div>
          <div class="card-body">
            <p>Calorias consumidas: <strong>
              <?php
              $total = 0;
              foreach ($refeicoes as $r) $total += $r['calorias'];
              echo $total . ' kcal';
              ?>
            </strong></p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?= min(100, ($total/2000)*100) ?>%;"></div>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">Objetivo Diário</div>
          <div class="card-body">
            <p>Meta: 2.000 kcal | Faltam: <?= max(0, 2000 - $total) ?> kcal</p>
    
          </div>
        </div>

        <div class="card">
          <div class="card-header">Passos de Hoje</div>
          <div class="card-body">
            <p>7.500 passos</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 75%;"></div>
            </div>
            <small class="text-muted">Mais 2.500 passos para bater sua meta de 10.000!</small>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
