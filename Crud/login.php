<!-- login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | Nutribem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="form-container sign-up">
        <div class="logo-container">
            <img src="../assets/img/logo_nutribem.png" alt="Logo Nutribem">
        </div>

        <form method="post" action="verifica_login.php">
            <h2>Fazer Login</h2>

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" placeholder="Senha" required>
            </div>

            <center>
                <button type="submit" class="cadastro">Entrar</button>
            </center>

            <div class="login-link">
                Não tem uma conta? <a href="cadastro.php">Faça o cadastro</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
