<?php
require_once '../Config/Conexao.php';
require_once '../classes/alimento.class.php';

$alimentos = Alimento::listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Refeição</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <script>
    let alimentosSelecionados = [];

    function adicionarAlimento() {
      const select = document.getElementById('alimento_id');
      const quantidadeInput = document.getElementById('quantidade');
      const alimentosDiv = document.getElementById('alimentosAdicionados');
      const alimentosInput = document.getElementById('alimentosInput');

      const alimentoId = select.value;
      const nomeAlimento = select.options[select.selectedIndex].text;
      const quantidade = quantidadeInput.value;

      if (!alimentoId || !quantidade || quantidade <= 0) {
        alert("Selecione um alimento e uma quantidade válida.");
        return;
      }

      // Evita adicionar alimentos duplicados (opcional)
      if (alimentosSelecionados.find(item => item.id == alimentoId)) {
        alert("Este alimento já foi adicionado.");
        return;
      }

      // Adiciona ao array de alimentos
      alimentosSelecionados.push({
        id: alimentoId,
        nome: nomeAlimento,
        quantidade: quantidade
      });

      // Atualiza visualmente a lista de alimentos
      const item = document.createElement('div');
      item.className = 'alert alert-secondary d-flex justify-content-between align-items-center';
      item.innerHTML = `
        <span>${nomeAlimento} - ${quantidade}g</span>
        <button type="button" class="btn btn-sm btn-danger" onclick="removerAlimento('${alimentoId}', this)">Remover</button>
      `;
      alimentosDiv.appendChild(item);

      // Atualiza o campo escondido para envio
      alimentosInput.value = JSON.stringify(alimentosSelecionados);

      // Limpa os campos
      select.value = "";
      quantidadeInput.value = "";
    }

    function removerAlimento(id, btn) {
      alimentosSelecionados = alimentosSelecionados.filter(item => item.id != id);
      btn.parentElement.remove();
      document.getElementById('alimentosInput').value = JSON.stringify(alimentosSelecionados);
    }

    function prepararEnvio() {
      document.getElementById('alimentosInput').value = JSON.stringify(alimentosSelecionados);
    }
  </script>

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
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="LoginIndex.php">Sair</a></li>
      </ul>
    </div>
  </div>
</header>
<div class="container mt-5">
  <h2>Cadastrar Nova Refeição</h2>
  <form action="salvar_refeicao.php" method="post" onsubmit="prepararEnvio()">

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

  <div class="row mb-3">
    <div class="col-md-6">
      <label for="alimento_id" class="form-label">Alimento</label>
      <select id="alimento_id" name="alimento_id" class="form-select">
        <option value="">Selecione o alimento</option>
        <?php foreach ($alimentos as $alimento): ?>
          <option value="<?= $alimento['id'] ?>" data-nome="<?= htmlspecialchars($alimento['nome']) ?>">
            <?= htmlspecialchars($alimento['nome']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-4">
      <label for="quantidade" name="quantidade" class="form-label">Quantidade (g)</label>
      <input type="number" id="quantidade" class="form-control" min="1">
    </div>

    <div class="col-md-2 d-flex align-items-end">
      <button type="button" class="btn btn-success w-100" onclick="adicionarAlimento()">+</button>
    </div>
  </div>


  <div id="alimentosAdicionados" class="mb-3"></div>


  <input type="hidden" name="alimentos" id="alimentosInput">

  <div class="d-grid gap-2">
    <button type="submit" class="btn btn-success">Salvar Refeição</button>
    <a href="../index.php" class="btn btn-outline-secondary">Voltar</a>
  </div>
</form>
</div>
</body>
</html>
