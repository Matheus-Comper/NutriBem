<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil - Nutribem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <link rel="stylesheet" href="assets/css/meuperfil.css">
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
          <li><a class="dropdown-item" href="Meuperfil.php">Meu Perfil</a></li>
          <li><a class="dropdown-item" href="Crud/cadastro.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </header>
  <div class="perfil-wrapper">
    <div class="perfil-card">
      <div class="perfil-img">
        <i class="bi bi-person-fill"></i>
      </div>
      
      <div class="perfil-nome">NOME USUÁRIO</div>
      <div class="perfil-email">lucasxumbaca1234@gmail.com</div>
<br>
      <div class="perfil-item">Meus Dados</div>
      <div class="perfil-item">Sobre Nós</div>
      <div class="perfil-item">Configurações</div>
      <div class="perfil-item">Ajuda</div>
      <a href="index.php"><div class="perfil-item">Sair</div></a>
    </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
