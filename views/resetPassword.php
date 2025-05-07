<?php
require_once __DIR__.'/../controllers/AuthController.php';

$token = $_GET['token'] ?? '';
$_POST['token'] = $token;
$error = $_GET['error'] ?? '';

if (empty($token)) {
    header('Location: forgotPassword.php');
    exit;
}

$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['password'])) {
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $authController->procesarNuevaPassword($token, $password);
    }
} else {
    //header('Location: forgotPassword.php');
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
        <h3 class="login-title">Nueva Contraseña</h3>
        
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php 
                $errors = [
                    'invalid_token' => 'Token inválido o expirado',
                    'password_length' => 'La contraseña debe tener al menos 8 caracteres',
                    'update_failed' => 'Error al actualizar contraseña'
                ];
                echo $errors[$error] ?? 'Ocurrió un error';
                ?>
            </div>
        <?php endif; ?>
        
        <form action="resetPassword.php?token=<?=$token?>" method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            
            <div class="mb-4">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" name="password" class="form-control" >
                <small class="text-muted">Mínimo 8 caracteres</small>
            </div>
            
            <button type="submit" class="btn btn-login">Actualizar Contraseña</button>
        </form>
    </div>
</div>
</body>
</html>