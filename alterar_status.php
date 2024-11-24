<?php
session_start();
include 'conectar.php';

if (!isset($_SESSION['id_tecnico'])) {
    header("Location: formadelogin.html");
    exit();
}

if (empty($_POST['pedidos_selecionados'])) {
    header("Location: errotecnico.html");;
    exit();
}

$ID_tecnico = $_SESSION['id_tecnico'];

$pedidosSelecionados = $_POST['pedidos_selecionados'];

foreach ($pedidosSelecionados as $ID_pedido) {

    $stmt = $pdo->prepare("SELECT status FROM pedidos WHERE id = ?");
    $stmt->execute([$ID_pedido]);
    $pedido = $stmt->fetch();

    if (!$pedido) {
        header("Location: errotecnico.html");;
        continue;
    }

    $statusAtual = $pedido['status'];

    if ($statusAtual === 'Pendente') {
        $novoStatus = 'Andamento';
    } elseif ($statusAtual === 'Andamento') {
        $novoStatus = 'Concluído';
    } else {
        continue;
    }

    $stmt = $pdo->prepare("UPDATE pedidos SET status = ?, ID_tecnico = ? WHERE id = ?");
    $stmt->execute([$novoStatus, $ID_tecnico, $ID_pedido]);
}

header("Location: tecnico.php");
exit();
?>