<?php

session_start();

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        echo "As senhas não coincidem. Tente novamente.";
        exit();
    }

    $stmt = $pdo->prepare("SELECT senha FROM usuario WHERE Email = :Email");
    $stmt->bindParam(':Email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit();
    }

    if (!password_verify($senha_atual, $usuario['senha'])) {
        echo "Senha atual incorreta. Tente novamente.";
        exit();
    }

    $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE usuario SET senha = :senha WHERE Email = :Email");
    $stmt->bindParam(':senha', $senha_hash);
    $stmt->bindParam(':Email', $email);

    if ($stmt->execute()) {
        echo "Senha alterada com sucesso!";
    } else {
        echo "Erro ao alterar a senha. Tente novamente.";
    }
}
?>