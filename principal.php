<?php
  session_start();
  if (!isset($_SESSION['usuario_email'])) {
    header("Location: Crud/login.php");
    exit;
  }
  require_once 'refeicao/cadastrar_refeicao.php';
  require_once 'classes/Alimento.class.php';
  require_once 'classes/Usuario.class.php';
  require_once 'classes/refeicao.class.php';

  $usuario = Usuario::buscarPorEmail($_SESSION['usuario_email']);

  $meta_calorias    = $usuario['meta_calorias'] ?? 2000;
  $meta_proteina    = $usuario['meta_proteina'] ?? 100;
  $meta_carboidrato = $usuario['meta_carboidrato'] ?? 250;
  $meta_gordura     = $usuario['meta_gordura'] ?? 70; 

  $alimentos = Alimento::listarTodos(); 

  $refeicoes = Refeicao::listarTodasComAlimentos(); 

$consumido_calorias = 0;
$consumido_proteina = 0;
$consumido_carboidrato = 0;
$consumido_gordura = 0;

foreach ($refeicoes as $refeicao) {
    if (!empty($refeicao['alimentos'])) {
        foreach ($refeicao['alimentos'] as $alimento) {
            $quant = $alimento['quantidade'] / 100; 
            $consumido_calorias    += $alimento['calorias'] * $quant;
            $consumido_proteina    += $alimento['proteina'] * $quant;
            $consumido_carboidrato += $alimento['carboidrato'] * $quant;
            $consumido_gordura     += $alimento['gordura'] * $quant;
        }
    }
}

$percent_calorias    = ($meta_calorias > 0) ? ($consumido_calorias / $meta_calorias) * 100 : 0;
$percent_proteina    = ($meta_proteina > 0) ? ($consumido_proteina / $meta_proteina) * 100 : 0;
$percent_carboidrato = ($meta_carboidrato > 0) ? ($consumido_carboidrato / $meta_carboidrato) * 100 : 0;
$percent_gordura     = ($meta_gordura > 0) ? ($consumido_gordura / $meta_gordura) * 100 : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Nutribem</title>
  <link href="assets/css/index.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php include 'alimento/modal_alimento.php'; ?>

<body>

  <div class="topbar w-100">
    <img src="assets/img/nutribem_logo.png" alt="Logo Nutribem">
  </div>

  <div class="container-fluid">
    <div class="row">

      <?php include 'menu.php'; ?>

      <div class="col-md-9 col-lg-10 p-4">

        <div class="row">
          <div class="col-md-6">
            <div class="refeicoes" style="max-height: 450px; overflow-y: auto;">
              <h5 class="mb-3">Meu dia</h5>
              <?php 
                $tipos_refeicao = [
                  'cafe_manha' => 'Café da Manhã',
                  'almoco' => 'Almoço',
                  'cafe_tarde' => 'Café da Tarde',
                  'janta' => 'Janta'
                ];

                foreach ($tipos_refeicao as $tipo => $nome): 
              ?>
                <div class="ref-item">
                
                  <div class="header" data-bs-toggle="collapse" href="#collapse<?= $tipo ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $tipo ?>">
                    <span><i class="bi bi-cup-hot me-1"></i> <?= $nome ?></span>
                    <i class="bi bi-chevron-down"></i>
                  </div>

                  <div class="mb-2 d-flex justify-content-end">
                    <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= ucfirst($tipo) ?>">
                      <i class="bi bi-plus-circle me-1"></i> Adicionar alimento
                    </button>
                  </div>

                  <div class="collapse" id="collapse<?= $tipo ?>">
                    <div class="table-responsive">
                      <table id="tabela-<?= $tipo ?>" class="table table-bordered table-sm table-striped w-100">
                        <thead class="table-light">
                          <tr>
                            <th>Alimento</th>
                            <th>Quantidade (g)</th>
                            <th>Proteína (g)</th>
                            <th>Carboidrato (g)</th>
                            <th>Gordura (g)</th>
                            <th>Calorias (kcal)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $temAlimentos = false;
                          foreach ($refeicoes as $r):
                              if ($r['tipo'] === $tipo):
                                  $temAlimentos = true;
                          ?>
                              <tr>
                                  <td><?= htmlspecialchars($r['descricao']) ?></td>
                                  <td><?= number_format ($r['quantidade']) ?>g</td>
                                  <td><?= number_format($r['proteina'], 1) ?></td>
                                  <td><?= number_format($r['carboidrato'], 1) ?></td>
                                  <td><?= number_format($r['gordura'], 1) ?></td>
                                  <td><?= number_format($r['calorias'], 0) ?></td>
                              </tr>
                          <?php 
                              endif;
                          endforeach;

                          if (!$temAlimentos):
                          ?>
                              <tr>
                                  <td colspan="6" class="text-center">Nenhum alimento cadastrado nesta refeição.</td>
                              </tr>
                          <?php endif; ?>
                          </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="metas">
              <h5 class="mb-3">Minhas Metas</h5>

              <?php if (!isset($usuario['meta_calorias'])): ?>
                <div class="alert alert-warning">
                  Você ainda não definiu suas metas nutricionais. <a href="Meuperfil.php">Clique aqui</a> para configurar.
                </div>
              <?php endif; ?>

              <p class="mb-1">Calorias <span class="float-end"><?= round($consumido_calorias) ?>/<?= $meta_calorias ?> kcal</span></p>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: <?= $percent_calorias ?>%"></div>
              </div>

              <p class="mb-1">Proteínas <span class="float-end"><?= round($consumido_proteina) ?>/<?= $meta_proteina ?> g</span></p>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: <?= $percent_proteina ?>%"></div>
              </div>

              <p class="mb-1">Carboidratos <span class="float-end"><?= round($consumido_carboidrato) ?>/<?= $meta_carboidrato ?> g</span></p>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: <?= $percent_carboidrato ?>%"></div>
              </div>

              <p class="mb-1">Gorduras <span class="float-end"><?= round($consumido_gordura) ?>/<?= $meta_gordura ?> g</span></p>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: <?= $percent_gordura ?>%"></div>
              </div>

            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12">
            <div class="alimentos">
              <h6>Meus alimentos</h6>
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover table-striped">
                  <thead class="table-success">
                    <tr>
                      <th>Nome</th>
                      <th>Proteínas</th>
                      <th>Carboidratos</th>
                      <th>Gorduras</th>
                      <th>Calorias</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($alimentos)): ?>
                      <?php foreach ($alimentos as $a): ?>
                        <tr>
                          <td><?= htmlspecialchars($a['nome']) ?></td>
                          <td><?= number_format($a['proteina'], 1) ?>g</td>
                          <td><?= number_format($a['carboidrato'], 1) ?>g</td>
                          <td><?= number_format($a['gordura'], 1) ?>g</td>
                          <td><?= number_format($a['calorias'], 0) ?> kcal</td>
                          <td>
                            <form action="alimento/excluir_alimento.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este alimento?');">
                              <input type="hidden" name="id" value="<?= $a['id'] ?>">
                              <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" class="text-center">Nenhum alimento cadastrado ainda.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <button class="btn btn-success w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalNovoAlimento">
                Adicionar alimento
              </button>
            </div>
          </div>
        </div>

      </div> 
    </div> 
  </div> 
                      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


