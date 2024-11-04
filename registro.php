<?php

require 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['senha'];

    $hashedPassword = password_hash($password, 1234);

    $sql = "INSERT INTO usuario (Email, senha) VALUES (:email, :password)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute(['Email' => $email, 'senha' => $hashedPassword]);
        echo "Usuário registrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao registrar usuário: " . $e->getMessage();
    }
}
?>