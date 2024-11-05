<?php

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Este email já foi registrado.";
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$nome, $email, $telefone, $senha])) {
            echo "Usuário registrado com sucesso!";

            header("Location: login.html");
            exit(); 
        } else {
            echo "Erro ao registrar o usuário.";
        }
    }
}
?>
