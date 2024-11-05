<?php

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        echo "Login realizado com sucesso!";
        
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];

        header("Location: home.html");
        exit(); 
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>
