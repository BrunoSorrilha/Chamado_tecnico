<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT nome, email, bio, foto FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit();
}

// Exibir os dados do usuário
?>
<div>
    <img src="<?php echo htmlspecialchars($user['foto'] ?? 'default.png'); ?>" alt="Foto de Perfil" width="150">
    <h1><?php echo htmlspecialchars($user['nome']); ?></h1>
    <p><?php echo htmlspecialchars($user['bio']); ?></p>
    <p><?php echo htmlspecialchars($user['email']); ?></p>
</div>