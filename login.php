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
        $_SESSION['user_id'] = $user['ID_usuario'];
        $_SESSION['nome'] = $user['Nome'];
        $_SESSION['adm'] = $user['Administrator'];

        header("Location: home.php");
        exit(); 
    } else {
        header("Location: errosenha.html");
        exit();
    }
}
?>
