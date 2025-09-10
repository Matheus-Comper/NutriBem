<?php
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header("Location: Crud/login.php");
    exit;
}

require_once "classes/Usuario.class.php";
require_once "Config/Conexao.php";

$emailLogado = $_SESSION['usuario_email'] ?? null;
$usuario = Usuario::buscarPorEmail($emailLogado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Configurações - Nutribem</title>
  <link href="assets/css/index.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="topbar w-100">
  <img src="assets/img/nutribem_logo.png" alt="Logo Nutribem">
</div>

<div class="container-fluid">
  <div class="row">
    <?php include 'menu.php'; ?>

    <!-- Conteúdo principal -->
    <div class="col-md-9 col-lg-10 p-4">
      <h4 class="mb-4">Configurações</h4>

      <div class="card shadow rounded-4 p-4">
        <!-- Notificações -->
        <h5 class="mb-3">Notificações</h5>
        <form method="post" action="Crud/atualizar_configuracoes.php">
          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="notificacoes_dia" id="notificacoes_dia" <?= ($usuario['notificacoes_dia'] ?? 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="notificacoes_dia">Lembrete diário de alimentação</label>
          </div>

          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="notificacoes_meta" id="notificacoes_meta" <?= ($usuario['notificacoes_meta'] ?? 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="notificacoes_meta">Aviso ao atingir metas nutricionais</label>
          </div>

          <hr class="my-4">

          <!-- Tema e idioma -->
          <h5 class="mb-3">Aparência e Idioma</h5>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Tema</label>
              <select name="tema" class="form-control">
                <option value="claro" <?= ($usuario['tema'] ?? '') === 'claro' ? 'selected' : '' ?>>Claro</option>
                <option value="escuro" <?= ($usuario['tema'] ?? '') === 'escuro' ? 'selected' : '' ?>>Escuro</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Idioma</label>
              <select name="idioma" class="form-control">
                <option value="pt" <?= ($usuario['idioma'] ?? '') === 'pt' ? 'selected' : '' ?>>Português</option>
                <option value="en" <?= ($usuario['idioma'] ?? '') === 'en' ? 'selected' : '' ?>>Inglês</option>
              </select>
            </div>
          </div>

          <hr class="my-4">

          <!-- Privacidade -->
          <h5 class="mb-3">Privacidade</h5>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="perfil_publico" id="perfil_publico" <?= ($usuario['perfil_publico'] ?? 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="perfil_publico">Perfil público</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="compartilhar_dados" id="compartilhar_dados" <?= ($usuario['compartilhar_dados'] ?? 0) ? 'checked' : '' ?>>
            <label class="form-check-label" for="compartilhar_dados">Permitir compartilhamento de dados anonimizados</label>
          </div>

          <div class="d-flex justify-content-between mt-4">
            <a href="Meuperfil.php" class="btn btn-link">Voltar ao perfil</a>
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
