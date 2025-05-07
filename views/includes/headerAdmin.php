<?php
    /*session_start();
    if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'Administrador') {
        header('location: ../login.php');
        exit;
    }*/
?>
<header class="sidebar">
    <nav>
        <div class="text-center my-4">
            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="rounded-circle user-avatar mb-3" alt="Avatar del administrador">
            <h5 class="text-white"><?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?></h5>
            <span class="badge bg-success">Administrador</span>
        </div>
        
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="dashboard_admin.php" aria-current="page">
                    <i class="fas fa-home" aria-hidden="true"></i> Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestion_miembros.php">
                    <i class="fas fa-users-cog" aria-hidden="true"></i> Gestionar Miembros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reportes_admin.php">
                    <i class="fas fa-chart-bar" aria-hidden="true"></i> Reportes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Graficos.php">
                    <i class="fas fa-chart-bar" aria-hidden="true"></i> Graficos
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link" href="../controllers/logout.php">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>
</header>