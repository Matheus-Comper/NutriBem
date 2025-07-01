<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4faf6;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
    }

    h2 {
      text-align: center;
      color: #2f8f2f;
      margin-bottom: 25px;
    }

    .config-item {
      margin-bottom: 20px;
    }

    .config-item label {
      display: flex;
      align-items: center;
      font-weight: bold;
      color: #444;
    }

    .config-item label i {
      margin-right: 10px;
      color: #2f8f2f;
    }

    .config-item input[type="checkbox"] {
      margin-left: auto;
      transform: scale(1.2);
    }

    .config-item select, .config-item input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-top: 6px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn-salvar {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #2f8f2f;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      margin-top: 25px;
    }

    .btn-salvar:hover {
      background-color: #256e25;
    }

    .btn-voltar {
      display: block;
      width: 100px;
      margin: 20px auto 0;
      padding: 10px;
      background-color: #888;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
    }

    .btn-voltar:hover {
      background-color: #666;
    }
  </style>
</head>
<body>
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
