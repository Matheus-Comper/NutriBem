<!-- login.php -->
<?php
require_once '../Config/Conexao.php';
require_once '../classes/Usuario.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = Usuario::buscarPorEmail($email, $senha); 

    if ($usuario) {
        session_start();
        $_SESSION['usuario_email'] = $usuario['email'];
        header("Location: ../principal.php"); 
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | Nutribem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<div class="split">
    <div class="left">
        <div class="overlay">
            <h2>Bem-vindo de volta! <br> Faça login e continue cuidando da sua saúde</h2>
        </div>
    </div>

    <div class="right">
        <div class="form-container">
            <img src="../assets/img/logo_nutribem.png" alt="Logo Nutribem">
            <h2>Login</h2>

            <?php if(isset($erro)) echo "<div class='erro'>$erro</div>"; ?>

            <form method="post">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <button type="submit" class="cadastro">Entrar</button>

                <div class="login-link">
                    Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
