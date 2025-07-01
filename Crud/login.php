<?php
    require_once '../Config/Conexao.php';
    require_once '../classes/Usuario.class.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Aqui você pode chamar um método para autenticar o usuário
        // Exemplo fictício: Usuario::login($email, $senha);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | Nutribem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-container sign-in">
            <form method="post">
                <h2>Entrar</h2>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <center><button type="submit" name="acao" value="entrar" class="cadastro">Entrar</button></center>

                <div class="login-link">
                Já tem uma conta?<a href="cadastro.php"> Faça login</a>
                </div>


            </form>
        </div>
    </div>
</body>
</html>
