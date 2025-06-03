<?php
    require_once 'Config/Conexao.php';
    require_once 'classes/Usuario.class.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
<<<<<<< HEAD:Crud/cadastro.php
        $usuario = new usuario(
            $_POST['nome'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['dataNasc'],
            $_POST['sexo']
        );
=======
    $refeicao = new Refeicao(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha'],
        $_POST['dataNasc'],
        $_POST['sexo'],
        $_POST['confirmSenha']
    );
    $refeicao->salvar();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
>>>>>>> c22026e9a635b86f53f06c681548e514f9747d16:LoginIndex.php
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro | Nutribem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-container sign-up">
            <form method="post">
                <h2>Criar Conta</h2>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>ou use seu e-mail para se registrar:</span>

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nome" placeholder="Nome completo" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirmSenha" placeholder="Confirmar Senha" required>
                </div>

                <center><button type="submit" name="acao" value="salvar" class="cadastro">Cadastrar</button></center>
            </form>
        </div>

        <div class="form-container overlay">
            <div class="overlay-panel">
                <h2>Bem-vindo de volta!</h2>
                <p>Para continuar conectado, faça login com suas informações</p>
                <a href="login.php"><button class="ghost">Entrar</button></a>
            </div>
        </div>
    </div>
</body>
</html>

