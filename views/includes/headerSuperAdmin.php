<?php
    /*session_start();
    if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'SuperAdministrador') {
        header('location: ../login.php');
    }*/
?>
<header class="sidebar">
    <nav>
        <div class="text-center my-4">
            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="rounded-circle user-avatar mb-3" alt="Avatar del administrador">
            <h5 class="text-white"><?= htmlspecialchars($_SESSION['email']) ?></h5>
            <span class="badge bg-success">SuperAdministrador</span>
        </div>
        
        <ul class="nav flex-column px-3">
            <!-- Elementos originales mejorados -->
            <li class="nav-item">
                <a class="nav-link active" href="dashboard.php" aria-current="page">
                    <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                    <i class="fas fa-users" aria-hidden="true"></i> Gestionar Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="configuracion.php">
                    <i class="fas fa-cog" aria-hidden="true"></i> Configuración
                </a>
            </li>
            
            <!-- Nuevos elementos integrados -->
            <li class="nav-item">
                <a class="nav-link" href="reportes.php">
                    <i class="fas fa-chart-pie" aria-hidden="true"></i> Reportes
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="Graficos.php">
                    <i class="fas fa-chart-bar" aria-hidden="true"></i> Graficos
                </a>
            </li>

            
            <!-- Cerrar sesión con espacio superior -->
            <li class="nav-item mt-4">
                <a class="nav-link" href="../controllers/logout.php">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>
</header>