<?php

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email-de-contato'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $CPF = $_POST['CPF'];

    $stmt = $pdo->prepare("SELECT * FROM tecnico WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Este email já foi registrado.";
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO tecnico (nome, email, senha, CPF, telefone) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$nome, $email, $senha, $CPF, $telefone,])) {
            echo "Usuário registrado com sucesso!";

            header("Location: currriculo.html");
            exit(); 
        } else {
            echo "Erro ao registrar o usuário.";
        }
    }
}
?>