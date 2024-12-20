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
    <link rel="stylesheet" href="./css/edit.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="profile-container">
        <h1>Editar Perfil</h1>
        <form id="editProfileForm">
            <!-- Pré-visualização da Imagem com Lixeira -->
            <div class="profile-image-container">
                <img id="profileImagePreview" src="./img/foto1.png" class="profile-edit-img" alt="Imagem de perfil">
                <label for="profileImage" class="edit-icon"><img class="imgedit" src="./img/LOGO/lapis.png" alt=""></label>
                <input type="file" id="profileImage" accept="image/*" style="display:none;">
                
                <!-- Ícone de lixeira para remover imagem -->
                <img src="./img/LOGO/lixeira.png" class="trash-icon" alt="Remover imagem" onclick="removeImage()">
            </div>

            <!-- Campos de texto para edição -->
            <label for="name">Nome:</label>
            <input type="text" id="name" placeholder="Nome Completo" value=<?php echo htmlspecialchars($nome);?>>

            <label for="username">Usuario:</label>
            <input type="text" id="username" placeholder="Nome de Usuário" value="cliente12345">

            <label for="bio">Biografia:</label>
            <textarea id="bio" rows="4" placeholder="Escreva algo sobre você">Olá, sou novo aqui no Byte Amigo!</textarea>

            <!-- Botões de ação -->
            <button type="submit" class="save-btn">Salvar</button>
            <button type="button" class="cancel-btn" onclick="cancelEdit()">Cancelar</button>
        </form>
    </div>
    
    <script src="./js/edit.js"></script>
</body>
</html>
