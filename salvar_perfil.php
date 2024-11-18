<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$bio = $_POST['bio'];

// Diretório para salvar as fotos
$diretorio_upload = "uploads/";
$caminho_foto = null;

if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
    $foto = $_FILES['foto_perfil'];
    $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $nome_arquivo = uniqid("perfil_") . "." . $extensao;

    // Verificar se a extensão é válida
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extensao, $extensoes_permitidas)) {
        echo "Erro: Formato de arquivo inválido. Permitidos: jpg, jpeg, png, gif.";
        exit();
    }

    // Mover o arquivo para o diretório de upload
    if (!move_uploaded_file($foto['tmp_name'], $diretorio_upload . $nome_arquivo)) {
        echo "Erro ao salvar a foto de perfil.";
        exit();
    }

    // Caminho completo do arquivo
    $caminho_foto = $diretorio_upload . $nome_arquivo;
}

// Atualizar os dados no


if ($foto['size'] > 2 * 1024 * 1024) { // Limite de 2MB
    echo "Erro: O tamanho do arquivo excede o limite de 2MB.";
    exit();
}

// Diretório para salvar as fotos
$diretorio_upload = "uploads/";
$caminho_foto = null;
