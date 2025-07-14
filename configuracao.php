<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <link rel="stylesheet" href="assets/css/configuracao.css">
</head>
<body>

  <?php include 'navbar.php';?>

  <div class="container">
    <h2>Configurações</h2>

    <form>
      <div class="config-item">
        <label><i class="fas fa-moon"></i>Modo Escuro
          <input type="checkbox" name="darkmode">
        </label>
      </div>

      <div class="config-item">
        <label><i class="fas fa-language"></i>Idioma</label>
        <select name="idioma">
          <option value="pt">Português</option>
          <option value="en">English</option>
          <option value="es">Español</option>
        </select>
      </div>

      <div class="config-item">
        <label><i class="fas fa-lock"></i>Alterar Senha</label>
        <input type="password" name="nova_senha" placeholder="Nova senha">
      </div>

      <button class="btn-salvar" type="submit">Salvar Alterações</button>
    </form>

    <a class="btn-voltar" href="Meuperfil.php">Voltar</a>
  </div>
</body>
</html>
