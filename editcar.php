<?php

session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION['nome'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Amigo</title>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="profile-container">
        <div class="profile-pic">
            <img id="profileImage" src="./img/foto1.png" alt="Foto de perfil">
        </div>
        <h1><?php echo htmlspecialchars($nome);?></h1>
        <p id="profileBio">Olá, sou novo aqui no Byte Amigo!.</p>
        <a href="edit.php"><button class="edit-btn">Editar perfil</button></a>
        <a href="home.php"><button class="edit-btn">inicio</button></a>
        <p class="edit-btn"><a href="password.html" class="link">Esqueceu sua senha ?</a></p>
    </div>

    <script src="./js/carregar.js"></script>
</body>
</html>
