<?php
session_start();
require_once "../Config/Conexao.php";
require_once "../classes/Usuario.class.php";

if (!isset($_SESSION['usuario_email'])) {
    header("Location: login.php");
    exit;
}

$emailLogado = $_SESSION['usuario_email'] ?? null;
$usuario = Usuario::buscarPorEmail($emailLogado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $dataNasc = $_POST['data_nasc'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $meta_calorias = $_POST['meta_calorias'];
    $meta_proteina = $_POST['meta_proteina'];
    $meta_carboidrato = $_POST['meta_carboidrato'];
    $meta_gordura = $_POST['meta_gordura'];


    $fotoPath = $usuario['foto'] ?? "assets/img/user.png";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid("foto_") . "." . $ext;
        $destino = "../uploads/" . $nomeArquivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
            $fotoPath = "uploads/" . $nomeArquivo; 
        }
    }

    $userObj = new Usuario();
    $userObj->setId($usuario['id_usuario']);
    $userObj->setNome($nome);
    $userObj->setDataNasc($dataNasc);
    $userObj->setSexo($sexo);
    $userObj->setEmail($email);
    $userObj->setFoto($fotoPath);
    $userObj->setMetaCalorias($meta_calorias);
    $userObj->setMetaProteina($meta_proteina);
    $userObj->setMetaCarboidrato($meta_carboidrato);
    $userObj->setMetaGordura($meta_gordura);

    if ($userObj->atualizar($usuario['email'])) {

        $_SESSION['usuario_email'] = $email;
        header("Location: ../Meuperfil.php?success=1");
        exit;
    } else {
        header("Location: ../Meuperfil.php?error=1");
        exit;
    }
}
?>
