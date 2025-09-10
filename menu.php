    <div class="col-md-3 col-lg-2 sidebar">
      <div class="d-flex align-items-center mb-3">
        <div class="profile-img me-2"></div>
        <span><?= htmlspecialchars($usuario['nome'] ?? 'Usuário') ?></span>
      </div>

      <a href="principal.php"><i class="bi bi-house-fill"></i> Tela Principal</a>
      <a href="Meuperfil.php"><i class="bi bi-person-fill"></i> Meu Perfil</a>
      <a href="recompensas.php"><i class="bi bi-star-fill"></i> Recompensas</a>
      <a href="configuracoes.php"><i class="bi bi-gear-fill"></i> Configurações</a>
      <a href="logout.php"><i class="bi bi-box-arrow-right danger"></i> Sair</a>
    </div>
