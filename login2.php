<?php

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM tecnico WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        echo "Login realizado com sucesso!";
        
        session_start();
        $_SESSION['id_tecnico'] = $user['ID_tecnico'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];

        header("Location: tecnico.php");
        exit(); 
    } else {
        header("Location: errosenha.html");
        exit();
    }
}
?>
