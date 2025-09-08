<?php
require_once '../Config/Conexao.php';
require_once '../classes/Usuario.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];
    $dataNasc = $_POST['data_nasc'];
    $sexo = $_POST['sexo'];

    if ($senha !== $confirmSenha) {
        die('As senhas não coincidem!');
    }

    $usuario = new Usuario($nome, $email, $senha, $dataNasc, $sexo);
    $usuario->salvar();

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro | Nutribem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
        
</head>
<body>
    <div class="split">
        <!-- Lado esquerdo -->
        <div class="left">
            <div class="overlay">
                <h2>Bem-vindo ao Nutribem! <br> Cadastre-se e cuide da sua saúde</h2>
            </div>
        </div>

        <!-- Lado direito -->
        <div class="right">
            <div class="form-container">
                <img src="../assets/img/logo_nutribem.png" alt="Logo Nutribem">
                <h2>Criar Conta</h2>

                <form method="post">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nome" placeholder="Nome completo" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-calendar"></i>
                        <input type="date" name="data_nasc" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-venus-mars"></i>
                        <select name="sexo" required>
                            <option value="">Selecione o sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirmSenha" placeholder="Confirmar senha" required>
                    </div>

                    <button type="submit" name="acao" value="salvar" class="cadastro">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
