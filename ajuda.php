<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajuda</title>
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
      background-color: white;
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

    .help-item {
      margin-bottom: 20px;
    }

    .help-item i {
      color: #2f8f2f;
      margin-right: 10px;
    }

    .help-item h3 {
      margin: 0 0 5px 0;
      font-size: 18px;
    }

    .help-item p {
      margin: 0;
      color: #555;
    }

    .btn-voltar {
      display: block;
      width: 100px;
      margin: 30px auto 0;
      padding: 10px;
      background-color: #2f8f2f;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
    }

    .btn-voltar:hover {
      background-color: #256e25;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Ajuda</h2>

    <div class="help-item">
      <h3><i class="fas fa-user-circle"></i>Como criar uma conta?</h3>
      <p>Preencha todos os campos com seus dados pessoais, incluindo email e senha, e clique em "Cadastrar".</p>
    </div>

    <div class="help-item">
      <h3><i class="fas fa-lock"></i>Esqueceu a senha?</h3>
      <p>Entre em contato com o suporte ou utilize a opção "Recuperar Senha" na página de login.</p>
    </div>

    <div class="help-item">
      <h3><i class="fas fa-envelope"></i>Problemas com o email?</h3>
      <p>Verifique se digitou o email corretamente. Certifique-se de que sua caixa de entrada não está cheia.</p>
    </div>

    <a class="btn-voltar" href="Meuperfil.php">Voltar</a>
  </div>
</body>
</html>
