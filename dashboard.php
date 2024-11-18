<?php 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['adm'] != 1) {
    header("Location: login.html");
    exit();
}

include 'conectar.php';

$stmt = $pdo->prepare("SELECT * FROM pedidos ORDER BY data_pedido DESC");
$stmt->execute();
$pedidos = $stmt->fetchAll();

$servicoFiltro = $_GET['servico'] ?? '';
$idUsuarioFiltro = $_GET['ID_usuario'] ?? '';

$query = "SELECT * FROM pedidos WHERE 1=1";
$params = [];

if ($servicoFiltro) {
    $query .= " AND servico = ?";
    $params[] = $servicoFiltro;
}

if ($idUsuarioFiltro) {
    $query .= " AND ID_usuario = ?";
    $params[] = $idUsuarioFiltro;
}

$query .= " ORDER BY data_pedido DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$pedidos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/button.css">
</head>
<body>
    
    <div class="app-container">
        <div class="app-header">
        <div class="app-header-left">
        <span class="app-icon"></span>
        <p class="app-name">byte amigo admin.</p>
        <div class="search-wrapper">
        <input class="search-input" type="text" placeholder="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
        <defs></defs>
        <circle cx="11" cy="11" r="8"></circle>
        <path d="M21 21l-4.35-4.35"></path>
        </svg>
        </div>
        </div>
        <div class="app-header-right">
        
        <button class="add-btn" title="Add New Project">
        <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
        <line x1="12" y1="5" x2="12" y2="19" />
        <line x1="5" y1="12" x2="19" y2="12" /></svg>
        </button>
        <button class="notification-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
        <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
        </button>
        <a href="editcar.php"><button   class="profile-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 19 19">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
        <span>ADMIN</span>
        </button></a>
        </div>
        <button class="messages-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
        </button>
        </div>
        <div class="app-content">
        <div class="app-sidebar">
        <a href="" class="app-sidebar-link active">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
        <polyline points="9 22 9 12 15 12 15 22" /></svg>
        </a>
        
       
        </div>
        <div class="projects-section">

        <form method="GET" action="dashboard.php">
        <label for="servico">Filtrar por Servico:</label>
        <select class="" id="servico" name="servico">
            <option value="">Todos</option>
            <option value="infraestrutura" <?php if ($servicoFiltro == 'infraestrutura') echo 'selected'; ?>>Manutencao de Infraestrutura</option>
            <option value="software" <?php if ($servicoFiltro == 'software') echo 'selected'; ?>>Manutencao de Software</option>
            <option value="consultoria" <?php if ($servicoFiltro == 'consultoria') echo 'selected'; ?>>Consultoria</option>
        </select>
        
        <label for="id_usuario">Filtrar por ID do Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" value="<?php echo htmlspecialchars($idUsuarioFiltro); ?>">

        <button type="submit">Buscar</button>
    </form>
        <form action="excluir_pedidos.php" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>ID Pedido</th>
                    <th>ID Usuario</th>
                    <th>Servico</th>
                    <th>Descricao</th>
                    <th>Data do Pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><input type="checkbox" name="pedidos_selecionados[]" value="<?php echo $pedido['id']; ?>"></td>
                    <td><?php echo $pedido['id']; ?></td>
                    <td><?php echo $pedido['ID_usuario']; ?></td>
                    <td><?php echo htmlspecialchars($pedido['servico']); ?></td>
                    <td><?php echo htmlspecialchars($pedido['descricao']); ?></td>
                    <td><?php echo $pedido['data_pedido']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <button type="submit">Excluir Pedidos Selecionados</button>
    </form>
        <div class="projects-section-header">
        

        <script src="./js/dash.js"></script>

</body>
</html>            