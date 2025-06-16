<?php
require_once ('Config/Conexao.php');
require_once ('classes/refeicao.class.php');

$refeicoes = Refeicao::listarTodasComAlimentos();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Nutribem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

</head>
<body>
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

  <div class="container mt-5">
    <h2>Refeições do Dia</h2>
    <br>
    <div class="mb-4">
      <a href="refeicao/cadastrar_refeicao.php" class="btn btn-success me-2">Cadastrar Nova Refeição</a>
      <a href="alimento/novo_alimento.php" class="btn btn-primary">Cadastrar Novo Alimento</a>
    </div>

    <br>
    <div class="row">
      <div class="col-md-6">
        <?php foreach ($refeicoes as $r): ?>
          <div class="mb-4">
            <strong>Refeição:</strong> <?= htmlspecialchars($r['refeicao'] ?? '') ?>

            <?php if (!empty($r['alimento_id'])): ?>
              <span> | <strong>Alimentos:</strong>
                <?php foreach ($r['alimento_id'] as $index => $alimento): ?>
                  <?= htmlspecialchars($alimento['nome']) ?> (<?= $alimento['quantidade'] ?>g)<?= $index < count($r['alimento_id']) - 1 ? ',' : '' ?>
                <?php endforeach; ?>
              </span>
            <?php endif; ?>

            <table class="table table-sm table-bordered mt-2">
              <thead class="table-light">
                <tr><th>Proteína</th><th>Carboidrato</th><th>Gordura</th><th>Calorias</th></tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $r['proteina'] ?>g</td>
                  <td><?= $r['carboidrato'] ?>g</td>
                  <td><?= $r['gordura'] ?>g</td>
                  <td><?= $r['calorias'] ?> kcal</td>
                </tr>
              </tbody>
            </table>

            <div class="d-flex gap-2">
              <a href="refeicao/excluir_refeicao.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-danger"
                onclick="return confirm('Tem certeza que deseja excluir esta refeição?')">
                Excluir
              </a>
            </div>
          </div>
        <?php endforeach; ?>                                          
      </div>

      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Consumo de Calorias</div>
          <div class="card-body">
            <?php
              $total = 0;
              foreach ($refeicoes as $r) $total += $r['calorias'];
            ?>
            <p>Calorias consumidas: <strong><?= $total ?> kcal</strong></p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?= min(100, ($total / 2000) * 100) ?>%;"></div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
