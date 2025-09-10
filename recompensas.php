<?php
  session_start();
  if (!isset($_SESSION['usuario_email'])) {
    header("Location: Crud/login.php");
    exit;
  }

  require_once 'classes/Usuario.class.php';
  $usuario = Usuario::buscarPorEmail($_SESSION['usuario_email']);

  // Exemplo de sistema simples de pontos
  $pontos = 150;

  // Recompensas fictícias
  $recompensas = [
    ['nome' => 'Recompensa 1', 'pontos' => 50],
    ['nome' => 'Recompensa 2', 'pontos' => 120],
    ['nome' => 'Recompensa 3', 'pontos' => 200],
  ];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Recompensas - Nutribem</title>
  <link href="assets/css/index.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="topbar w-100">
  <img src="assets/img/nutribem_logo.png" alt="Logo Nutribem">
</div>

<div class="container-fluid">
  <div class="row">

    <?php include 'menu.php'; ?>
    <div class="col-md-9 col-lg-10 p-4">
      <h4 class="mb-4"><i class="bi bi-star-fill text-warning me-2"></i>Minhas Recompensas</h4>

      <div class="alert alert-info">
        Você tem <strong><?= $pontos ?></strong> pontos acumulados!
      </div>

      <div class="row">
        <?php foreach ($recompensas as $r): ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <h5 class="card-title"><?= $r['nome'] ?></h5>
                  <p class="card-text">Requer <strong><?= $r['pontos'] ?></strong> pontos</p>
                </div>
                <button 
                  class="btn btn-outline-<?= ($pontos >= $r['pontos']) ? 'success' : 'secondary' ?> mt-3"
                  <?= ($pontos >= $r['pontos']) ? '' : 'disabled' ?>
                >
                  <?= ($pontos >= $r['pontos']) ? 'Resgatar' : 'Insuficiente' ?>
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <hr>

      <h6 class="mt-4">Como ganhar mais pontos?</h6>
      <ul>
        <li>Adicione refeições diariamente: <strong>+5 pontos</strong></li>
        <li>Complete suas metas nutricionais: <strong>+10 pontos</strong></li>
        <li>Cadastre novos alimentos: <strong>+2 pontos</strong></li>
      </ul>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
