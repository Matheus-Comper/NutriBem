<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Alimento</title>
</head>
<body>
  <h1>Novo Alimento</h1>
  <form action="salvar_alimento.php" method="POST">
    <label>Nome do alimento:</label>
    <input type="text" name="nome" required><br><br>

    <label>Classificação (refeição):</label>
    <select name="refeicao" required>
      <option value="">Selecione</option>
      <option value="Café da Manhã">Café da Manhã</option>
      <option value="Almoço">Almoço</option>
      <option value="Lanche">Lanche</option>
      <option value="Jantar">Jantar</option>
    </select><br><br>

    <label>Proteínas (por 100g):</label>
    <input type="number" step="0.01" name="proteina" required><br><br>

    <label>Carboidratos (por 100g):</label>
    <input type="number" step="0.01" name="carboidrato" required><br><br>

    <label>Gorduras (por 100g):</label>
    <input type="number" step="0.01" name="gordura" required><br><br>

    <label>Calorias (por 100g):</label>
    <input type="number" step="0.01" name="calorias" required><br><br>

    <button type="submit">Salvar Alimento</button>
  </form>

  <p><a href="index.php">Voltar para montar refeição</a></p>
</body>
</html>
