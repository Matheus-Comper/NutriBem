<?php
    include "Login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Login.php" method="post">

        <input type="text" name="id" id="id">

        <br>

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

    <table border="1">
        <th>Id</th>
        <th>Peso</th>
        <th>Descrição</th>
        <th>Anexo</th>
        <?php
            require_once "Login.class.php";

            //$lista = Atividade::listar(); 
            foreach($lista as $login){
                echo "<tr><td><a href='index.php?id={$login['id']}'>{$login['id']}</td><td>{$login['nome']}</a>
                </td><td>{$login['email']}</td><td>{$login['senha']}</td><td>{$login['dataNasc']}</td></tr>";
            }
        ?>
    </table>
</body>
</html>