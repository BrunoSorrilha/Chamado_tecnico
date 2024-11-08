<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['adm'] != 1) {
    header("Location: login.html");
    exit();
}

include 'conectar.php';

if (isset($_POST['pedidos_selecionados']) && is_array($_POST['pedidos_selecionados'])) {
    $idsParaExcluir = $_POST['pedidos_selecionados'];
    
    $placeholders = implode(',', array_fill(0, count($idsParaExcluir), '?'));
    
    $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id IN ($placeholders)");
    if ($stmt->execute($idsParaExcluir)) {
        echo "Pedidos excluídos com sucesso!";
    } else {
        echo "Erro ao excluir pedidos. Tente novamente.";
    }
} else {
    echo "Nenhum pedido selecionado para exclusão.";
}

header("Location: dashboard.php");
exit();
?>