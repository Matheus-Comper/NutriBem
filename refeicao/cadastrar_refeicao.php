<?php
require_once 'classes/Alimento.class.php';
$alimentos = Alimento::listarTodos();
?>

<!-- CAFÉ DA MANHÃ -->
<div class="modal fade" id="modalcafe_manha" tabindex="-1" aria-labelledby="modalcafe_manhaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="refeicao/salvar_refeicao.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Café da Manhã</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="refeicao" value="cafe_manha">
          <div class="mb-3">
            <label>Alimento</label>
            <select class="form-select" name="alimento_id" required>
              <option value="">Selecione um alimento</option>
              <?php foreach ($alimentos as $a): ?>
                <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Quantidade (g)</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" required min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- ALMOÇO -->
<div class="modal fade" id="modalAlmoco" tabindex="-1" aria-labelledby="modalAlmocoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="refeicao/salvar_refeicao.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Almoço</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="refeicao" value="almoco">
          <div class="mb-3">
            <label>Alimento</label>
            <select class="form-select" name="alimento_id" required>
              <option value="">Selecione um alimento</option>
              <?php foreach ($alimentos as $a): ?>
                <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Quantidade (g)</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" required min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- CAFÉ DA TARDE -->
<div class="modal fade" id="modalcafe_tarde" tabindex="-1" aria-labelledby="modalcafe_tardeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="refeicao/salvar_refeicao.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Café da Tarde</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="refeicao" value="cafe_tarde">
          <div class="mb-3">
            <label>Alimento</label>
            <select class="form-select" name="alimento_id" required>
              <option value="">Selecione um alimento</option>
              <?php foreach ($alimentos as $a): ?>
                <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Quantidade (g)</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" required min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- JANTA -->
<div class="modal fade" id="modalJanta" tabindex="-1" aria-labelledby="modalJantaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="refeicao/salvar_refeicao.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Janta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="refeicao" value="janta">
          <div class="mb-3">
            <label>Alimento</label>
            <select class="form-select" name="alimento_id" required>
              <option value="">Selecione um alimento</option>
              <?php foreach ($alimentos as $a): ?>
                <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Quantidade (g)</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" required min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>


