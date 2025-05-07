<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Si usas Composer para PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function enviarCorreoRecuperacion($destinatario, $enlaceRecuperacion) {
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'davidgui393@gmail.com';
            $mail->Password = 'ehnh wocn ccyd qpti';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            
            // Remitente y destinatario
            $mail->setFrom('davidgui393@gmail.com', 'Sistema de Membresía');
            $mail->addAddress($destinatario);
            
            $mail->CharSet = 'UTF-8'; // Asegurar soporte para caracteres especiales
            $mail->isHTML(true); // Indicar que el contenido es HTML
            $mail->Subject = 'Recuperación de contraseña';
            
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Recuperación de Contraseña</title>
                <style>
                    body {
                        font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                        line-height: 1.6;
                        color: #333;
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                    }
                    .container {
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 30px;
                        background-color: #ffffff;
                    }
                    .header {
                        color: #2c3e50;
                        text-align: center;
                        margin-bottom: 25px;
                    }
                    .logo {
                        max-width: 150px;
                        margin-bottom: 20px;
                    }
                    .button {
                        display: inline-block;
                        padding: 12px 24px;
                        background-color: #3498db;
                        color: white !important;
                        text-decoration: none;
                        border-radius: 4px;
                        font-weight: bold;
                        margin: 20px 0;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 12px;
                        color: #7f8c8d;
                        text-align: center;
                    }
                    .warning {
                        background-color: #f8f9fa;
                        padding: 15px;
                        border-left: 4px solid #e74c3c;
                        margin: 20px 0;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <!-- Reemplaza con tu logo si tienes uno -->
                    <!-- <img src="https://tudominio.com/logo.png" alt="Logo" class="logo"> -->
                    
                    <div class="header">
                        <h1>Recuperación de contraseña</h1>
                    </div>
                    
                    <p>Hola,</p>
                    
                    <p>Hemos recibido una solicitud para restablecer la contraseña asociada a tu cuenta.</p>
                    
                    <p>Para continuar con el proceso, haz clic en el siguiente botón:</p>
                    
                    <p style="text-align: center;">
                        <a href="'.$enlaceRecuperacion.'" class="button">Restablecer contraseña</a>
                    </p>
                    
                    <p style="text-align: center;">
                        <small>O copia y pega este enlace en tu navegador:<br>'.$enlaceRecuperacion.'</small>
                    </p>
                    
                    <div class="warning">
                        <p><strong>¿No solicitaste este cambio?</strong></p>
                        <p>Si no has sido tú quien ha solicitado restablecer la contraseña, por favor ignora este mensaje o contacta con nuestro equipo de soporte.</p>
                    </div>
                    
                    <div class="footer">
                        <p>Este enlace expirará en 1 hora por motivos de seguridad.</p>
                        <p>&copy; '.date('Y').' Tu Empresa. Todos los derechos reservados.</p>
                    </div>
                </div>
            </body>
            </html>
            ';
            
            // Versión alternativa para clientes de correo que no soportan HTML
            $mail->AltBody = "Recuperación de contraseña\n\nHemos recibido una solicitud para restablecer tu contraseña.\n\nPara continuar, visita este enlace: $enlaceRecuperacion\n\nSi no solicitaste este cambio, ignora este mensaje.\n\nEl enlace expirará en 1 hora.";
            
            return $mail->send();
        } catch (Exception $e) {
            error_log("Error al enviar correo: " . $mail->ErrorInfo);
            return false;
        }
    }
    public function enviarCorreoBienvenida($destinatario, $nombreUsuario) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'davidgui393@gmail.com';
            $mail->Password = 'ehnh wocn ccyd qpti';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            
            // Remitente y destinatario
            $mail->setFrom('davidgui393@gmail.com', 'Sistema de Membresía');
            $mail->addAddress($destinatario);
            
            $mail->CharSet = 'UTF-8'; // Asegurar soporte para caracteres especiales
            $mail->isHTML(true); // Indicar que el contenido es HTML
            $mail->Subject = 'Bienvenido a nuestro sistema';
            
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bienvenido</title>
                <style>
                    body {
                        font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                        line-height: 1.6;
                        color: #333;
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                    }
                    .container {
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 30px;
                        background-color: #ffffff;
                    }
                    .header {
                        color: #2c3e50;
                        text-align: center;
                        margin-bottom: 25px;
                    }
                    .button {
                        display: inline-block;
                        padding: 12px 24px;
                        background-color: #4CAF50;
                        color: white !important;
                        text-decoration: none;
                        border-radius: 4px;
                        font-weight: bold;
                        margin: 20px 0;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 12px;
                        color: #7f8c8d;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>¡Bienvenido, '.htmlspecialchars($nombreUsuario).'!</h1>
                    </div>
                    
                    <p>Gracias por registrarte en nuestro sistema de membresía.</p>
                    
                    <p>Ahora puedes disfrutar de todos los beneficios que ofrecemos:</p>
                    
                    <ul>
                        <li>Acceso a contenido exclusivo</li>
                        <li>Gestión de tu perfil personalizado</li>
                        <li>Soporte prioritario</li>
                        <li>Ofertas especiales para miembros</li>
                    </ul>
                    
                    <p style="text-align: center;">
                        <a href="https://tudominio.com/login" class="button">Iniciar sesión ahora</a>
                    </p>
                    
                    <p>Si tienes alguna pregunta, no dudes en contactar con nuestro equipo de soporte.</p>
                    
                    <div class="footer">
                        <p>&copy; '.date('Y').' Tu Empresa. Todos los derechos reservados.</p>
                    </div>
                </div>
            </body>
            </html>
            ';
            
            $mail->AltBody = "¡Bienvenido a nuestro sistema, $nombreUsuario!\n\nGracias por registrarte. Ahora puedes acceder a todos los beneficios de nuestra plataforma.\n\nPuedes iniciar sesión aquí: https://tudominio.com/login\n\nSi tienes alguna pregunta, contáctanos.\n\nSaludos cordiales,\nEl equipo de Tu Empresa";
            
            return $mail->send();
        } catch (Exception $e) {
            error_log("Error al enviar correo de bienvenida: " . $this->mail->ErrorInfo);
            return false;
        }
    }
}