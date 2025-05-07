<?php
    /*session_start();
    if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'Miembro') {
        header('location: ../login.php');
    }*/
?>
<header class="sidebar">
    <nav>
        <div class="text-center my-4">
            <img src="https://cdn-icons-png.flaticon.com/128/3899/3899618.png" class="rounded-circle user-avatar mb-3" alt="Avatar del miembro">
            <h5 class="text-white"><?= htmlspecialchars($_SESSION['email']) ?></h5>
            <span class="badge bg-info">Miembro</span>
        </div>
        
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="inicio_miembro.php" aria-current="page">
                    <i class="fas fa-home" aria-hidden="true"></i> Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="perfil.php">
                    <i class="fas fa-user" aria-hidden="true"></i> Perfil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload_cv.php">
                    <i class="fas fa-user" aria-hidden="true"></i> Subir Hoja de vida
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documentos.php">
                    <i class="fas fa-file-alt" aria-hidden="true"></i> Documentos
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