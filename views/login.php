<?php 
    require_once __DIR__.'/../controllers/AuthController.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $auth = new AuthController;
        $auth->loginUsuario($_POST);
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <?php require_once "./includes/styleLogin.html"?>
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h3 class="login-title">Iniciar Sesión</h3>
        <?php if (isset($_GET['error'])): ?>
            <div class='alert alert-danger mb-4 text-center'><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required placeholder="tu@email.com">
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••">
                    <span class="input-group-text" onclick="togglePassword('password', 'togglePassword')">
                        <img src="https://cdn-icons-png.flaticon.com/128/565/565655.png" width="20" class="password-toggle" alt="Mostrar" id="togglePassword">
                    </span>
                </div>
            </div>
            
            <button type="submit" name="login" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Ingresar
            </button>
            
            <div class="mt-4 text-center">
                ¿No tienes cuenta? <a href="registro.php" class="register-link">Regístrate aquí</a>
            </div>

            <div class="text-center">
                ¿Olvidaste tu contraseña? <a href="forgotPassword.php" class="register-link">Recupela Aquí</a>
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

<!-- Font Awesome para el ícono del botón -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>