<?php 
    require_once __DIR__.'/../controllers/AuthController.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $auth = new AuthController;
        $auth->validarEmail($_POST['email']);
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <?php require_once "./includes/styleLogin.html"?>
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h3 class="login-title">Recuperar Contraseña</h3>
        
        <!-- Mensajes de éxito/error -->
        <?php if (isset($_GET['error'])): ?>
            <div class='alert alert-danger mb-4 text-center'><?= htmlspecialchars($_GET['error']) ?></div>
        <?php elseif (isset($_GET['success'])): ?>
            <div class='alert alert-success mb-4 text-center'><?= htmlspecialchars($_GET['success']) ?></div>
        <?php endif; ?>
        
        <form action="forgotPassword.php" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required placeholder="tu@email.com">
                <small class="text-muted">Te enviaremos un enlace para restablecer tu contraseña.</small>
            </div>
            
            <button type="submit" name="submit" class="btn btn-login w-100">
                <i class="fas fa-paper-plane me-2"></i> Enviar Enlace
            </button>
            
            <div class="mt-4 text-center">
                ¿Recordaste tu contraseña? <a href="login.php" class="register-link">Inicia Sesión</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Función para mostrar/ocultar contraseña (si agregas campo de confirmación después)
    function togglePassword(id, iconId) {
        const input = document.getElementById(id);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.src = "https://cdn-icons-png.flaticon.com/128/565/565659.png";
        } else {
            input.type = "password";
            icon.src = "https://cdn-icons-png.flaticon.com/128/565/565655.png";
        }
    }
</script>
</body>
</html>