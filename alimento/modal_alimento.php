<div class="modal fade" id="modalNovoAlimento" tabindex="-1" aria-labelledby="modalNovoAlimentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalNovoAlimentoLabel">Novo Alimento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form action="alimento/salvar_alimento.php" method="POST">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome do alimento</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="classificacao" class="form-label">Classificação (refeição)</label>
            <select name="classificacao" id="classificacao" class="form-select" required>
              <option value="" selected disabled>Selecione</option>
              <option value="Café da manhã">Café da manhã</option>
              <option value="Almoço">Almoço</option>
              <option value="Jantar">Jantar</option>
              <option value="Lanche">Lanche</option>
              <option value="Pré-treino">Pré-treino</option>
              <option value="Pós-treino">Pós-treino</option>
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
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
