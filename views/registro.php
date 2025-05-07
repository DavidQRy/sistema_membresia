<?php 
    require_once __DIR__.'/../controllers/AuthController.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auth = new AuthController;
    $auth->registrarUsuario($_POST);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <?php require_once "./includes/styleRegistro.html"?>
</head>
<body>
<div class="register-container">
    <div class="register-card">
        <h3 class="register-title">Crear Cuenta</h3>
        
        <?php if (isset($_GET['error'])): ?>
            <div class='alert alert-danger mb-4 text-center'><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success'])): ?>
            <div class='alert alert-success mb-4 text-center'><?= htmlspecialchars($_GET['success']) ?></div>
        <?php endif; ?>
        
        <form action="registro.php" method="POST">
            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" required placeholder="Ej: Juan Pérez">
            </div>
            
            <div class="mb-4">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" required placeholder="tu@email.com">
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••">
                    <span class="input-group-text" onclick="togglePassword('password', 'togglePassword')">
                        <img src="https://cdn-icons-png.flaticon.com/128/565/565655.png" width="20" class="password-toggle" alt="Mostrar" id="togglePassword">
                    </span>
                </div>
                <small class="text-muted">Mínimo 8 caracteres</small>
            </div>
            
            <div class="mb-4">
                <label for="rol" class="form-label">Tipo de Cuenta</label>
                <select class="form-control" name="rol" required>
                    <option value="Miembro">Miembro</option>
                    <option value="SuperAdministrador">Administrador</option>
                    <option value="Administrador">Administrador</option>

                </select>
            </div>
            
            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus me-2"></i> Registrarse
            </button>
            
            <div class="mt-4 text-center">
                ¿Ya tienes una cuenta? <a href="login.php" class="login-link">Inicia Sesión</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Función para mostrar/ocultar contraseña mejorada
    function togglePassword(fieldId, iconId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.src = "https://cdn-icons-png.flaticon.com/128/159/159604.png";
            icon.alt = "Ocultar";
        } else {
            passwordField.type = "password";
            icon.src = "https://cdn-icons-png.flaticon.com/128/565/565655.png";
            icon.alt = "Mostrar";
        }
        
        // Agregar animación
        icon.style.transform = "scale(1.2)";
        setTimeout(() => {
            icon.style.transform = "scale(1)";
        }, 200);
    }
</script>

<!-- Font Awesome para íconos -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>
</html>

