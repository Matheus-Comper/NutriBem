<?php
require_once "../Config/Conexao.php";
require_once "../classes/Usuario.class.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $meta_calorias = $_POST['meta_calorias'];
    $meta_proteina = $_POST['meta_proteina'];
    $meta_carboidrato = $_POST['meta_carboidrato'];
    $meta_gordura = $_POST['meta_gordura'];

    $fotoPath = null;

    // Se o usuário enviou uma nova foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $pasta = "../uploads/";
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }
        
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid("foto_") . "." . $extensao;
        $caminhoCompleto = $pasta . $nomeArquivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoCompleto)) {
            $fotoPath = "uploads/" . $nomeArquivo; // Caminho relativo
        }
    }

    // Atualiza os dados do usuário
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setDataNasc($data_nasc);
    $usuario->setSexo($sexo);
    $usuario->setEmail($email);
    $usuario->setMetaCalorias($meta_calorias);
    $usuario->setMetaProteina($meta_proteina);
    $usuario->setMetaCarboidrato($meta_carboidrato);
    $usuario->setMetaGordura($meta_gordura);
    $usuario->setFoto($fotoPath);
  

    $usuario->atualizar(); // ajusta esse método na tua classe para atualizar o campo foto tbm

    header("Location: ../Meuperfil.php");
    exit;
}
