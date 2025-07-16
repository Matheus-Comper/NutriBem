<?php
  session_start();
  require_once "classes/Usuario.class.php";
  require_once "Config/Conexao.php";
  $emailLogado = $_SESSION['usuario_email'] ?? null;
  $usuario = Usuario::buscarPorEmail($emailLogado);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil - Nutribem</title>
  <link href="../assets/css/index.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Meu Perfil</h2>

    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card shadow rounded-4 p-4">
          <div class="d-flex align-items-center mb-4">
            <img src="../assets/img/user.png" alt="Foto de Perfil" width="80" class="rounded-circle me-3">
            <div>
              <h4 class="mb-0"><?= $usuario['nome'] ?></h4>
              <small class="text-muted"><?= $usuario['email'] ?></small>
            </div>
            <button class="btn btn-outline-secondary ms-auto"><i class="bi bi-pencil-fill"></i> Trocar Foto</button>
          </div>

          <form method="post" action="Crud/atualizar_perfil.php">
            <div class="mb-3">
              <label class="form-label">Nome completo</label>
              <input type="text" name="nome" value="<?= $usuario['nome'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Nascimento</label>
              <input type="date" name="data_nasc" value="<?= $usuario['dataNasc'] ?>"  required>
            </div>

            <div class="mb-3">
              <label class="form-label">Sexo</label>
              <select name="sexo" class="form-control" required>
                <option value="Masculino" <?= $usuario['sexo'] === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                <option value="Feminino" <?= $usuario['sexo'] === 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                <option value="Outro" <?= $usuario['sexo'] === 'Outro' ? 'selected' : '' ?>>Outro</option>
              </select>
            </div>


            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" value="<?= $usuario['email'] ?>" class="form-control" required>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Minhas metas nutricionais</h5>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Meta de Calorias (kcal)</label>
                <input type="number" name="meta_calorias" value="<?= $usuario['meta_calorias'] ?? '' ?>" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Proteína diária (g)</label>
                <input type="number" name="meta_proteina" value="<?= $usuario['meta_proteina'] ?? '' ?>" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Carboidrato diário (g)</label>
                <input type="number" name="meta_carboidrato" value="<?= $usuario['meta_carboidrato'] ?? '' ?>" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Gordura diária (g)</label>
                <input type="number" name="meta_gordura" value="<?= $usuario['meta_gordura'] ?? '' ?>" class="form-control" required>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
              <a href="redefinir_senha.php" class="btn btn-link">Redefinir senha</a>
              <button type="submit" class="btn btn-success px-4">Salvar alterações</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
