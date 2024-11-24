<?php

session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_SESSION['user_id'];
    $servico = $_POST['servico'];
    $descricao = $_POST['descricao'];

    if ($servico == 'default') {
        echo "Por favor, selecione um serviço válido.";
        exit();
    }

    $stmt = $pdo->prepare("INSERT INTO pedidos (ID_usuario, servico, descricao, Status) VALUES (?, ?, ?, 'Pendente')");
    if ($stmt->execute([$id_usuario, $servico, $descricao])) {
        echo "Pedido registrado com sucesso!";
        header("Location: pay.html");
        exit();
    } else {
        echo "Erro ao registrar o pedido. Tente novamente.";
    }
}
?>