<?php

session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Amigo</title>
    <link rel="stylesheet" href="./css/home.css">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">


</head>
<body>


    <section class="welcome-section">
        <div class="logo">
            <img src="./img/olá.png" alt="Logo Byte Amigo">
        </div>
        <div class="greeting">
            <h1>Ola, <span id="user-name"><?php echo htmlspecialchars($nome);?></span>!</h1>
            <p>Seja bem-vindo a Byte Amigo.</p>
            <p>Aqui valorizamos voce, e sua satisfacao</p>
            <a href="suporte.php" class="btn-contrate">Contrate-nos</a>
            <a href="editcar.php" class="btn-contrate">perfil</a>
        </div>
    </section>
>       
</body>
</html>
