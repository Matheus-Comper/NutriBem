const alimentosAdicionados = [];
  const alimentosContainer = document.getElementById('alimentosAdicionados');
  const alimentosInput = document.getElementById('alimentosInput');

  function adicionarAlimento() {
    const select = document.getElementById('alimento_id');
    const id = select.value;
    const nome = select.options[select.selectedIndex].dataset.nome;
    const quantidade = document.getElementById('quantidade').value;

    if (!id || !quantidade) return;

    alimentosAdicionados.push({ id, nome, quantidade });
    atualizarLista();
  }

  function atualizarLista() {
    alimentosContainer.innerHTML = '';
    alimentosAdicionados.forEach((item, index) => {
      alimentosContainer.innerHTML += `
        <div class="d-flex justify-content-between border rounded p-2 mb-2">
          <div>${item.nome} - ${item.quantidade}g</div>
          <button type="button" class="btn btn-sm btn-danger" onclick="removerAlimento(${index})">Remover</button>
        </div>
      `;
    });

    alimentosInput.value = JSON.stringify(alimentosAdicionados);
  }

  function removerAlimento(index) {
    alimentosAdicionados.splice(index, 1);
    atualizarLista();
  }

  function prepararEnvio() {
    alimentosInput.value = JSON.stringify(alimentosAdicionados);
  }
