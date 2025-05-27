<?php
    require_once 'Config/Conexao.php';
    require_once 'classes/Usuario.class.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $refeicao = new Refeicao(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha'],
        $_POST['dataNasc'],
        $_POST['sexo']
    );
    $refeicao->salvar();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
    }

$refeicoes = Refeicao::listarTodas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">

        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome">

        <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">

        <br>

        <label for="dataNasc">Data de Nascimento</label>
        <input type="text" name="dataNasc" id="dataNasc">

        <br>

        <label for="sexo">Sexo</label>
        <Select>
            <option value="0" selected>Selecione</option>
            <option value="masc">Masculino</option>
            <option value="femi">Feminino</option>
            <option value="ndizer">Prefiro não informar</option>
        </Select>

        <br>

        <button type="submit" name="acao" value="salvar">Salvar</button>
        <button type="submit" name="acao" value="excluir">Excluir</button>
        <button type="reset" name="acao" value="cancel">Cancelar</button>
    </form>

</body>
</html>