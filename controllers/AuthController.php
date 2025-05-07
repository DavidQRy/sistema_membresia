<?php
    require_once __DIR__.'/../models/Usuario.php';
    require_once __DIR__ . '/../helpers/Mailer.php';
    class AuthController{
        private Usuario $user;
        
        public function __construct(){
            $this->user = new Usuario();
        }

        public function registrarUsuario(array $datos):void{
            $nombre = $datos['nombre'];
            $email = $datos['email'];
            $rol = $datos['rol'];
            $password = $datos['password'];
            if($this->user->registrarUsuario($nombre, $email, $password, $rol)){
                echo "<script>
            window.onload = function() {
                Swal.fire({
                    title: '¡Usuario Creado!',
                    text: 'Los datos del producto se actualizaron exitosamente.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            };;
            </script>";
            $mailer = new Mailer();
            $mailer->enviarCorreoBienvenida($email, $nombre);
            }else{
                echo "Error al registrar";
            }
        }

        public function loginUsuario(array $datos):void{
            session_start();
            $email = $datos['email'];
            $password = $datos['password'];
            $usuario = $this->user->loginUsuario($email, $password);
            if ($usuario) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['rol'] = $usuario['rol'];
                header("location: ../views/dashboard.php");
                exit;



            } else {
                echo "<script>
            window.onload = function() {
                Swal.fire({
                    title: '¡Error a iniciar sesion!',
                    text: 'La contraseña o usuario no corresponden.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            };;
            </script>";
            }
        }

        public function validarEmail(string $email) {
            // Limpiar entrada del usuario
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($this->user->emailExiste($email)) {
                    $createToken = $this->user->crearTokenRecuperacion($email);
                    $mailer = new Mailer;
                    $mailer->enviarCorreoRecuperacion($email,"http://localhost/dise%C3%B1o-software-III/sistema_membresia/views/resetPassword.php?token={$createToken}");
                    header('Location: forgotPassword.php?success=Ya se envio el correo');
                    exit;
                } else {
                    header('Location: forgotPassword.php?error=email_not_found');
                    exit;
                }
            } else {
                header('Location: forgotPassword.php?error=invalid_email');
                exit;
            }
        }
        /**
         * Procesa el formulario de nueva contraseña
        */
        public function procesarNuevaPassword(string $token, string $nueva_password): void {
            // Validar token
            $usuario = $this->user->validarTokenRecuperacion($token);

            
            
/*             if (!$usuario) {
                header('Location: reset-password.php?token='.$token.'&error=invalid_token');
                exit;
            }

            // Validar longitud de contraseña
            if (strlen($nueva_password) < 8) {
                header('Location: reset-password.php?token='.$token.'&error=password_length');
                exit;
            } */
            if ($usuario != null) {
                // Actualizar contraseña
                if ($this->user->actualizarPassword($usuario['id'], $nueva_password)) {
                    $this->user->marcarTokenComoUsado($token);
                    header('Location: login.php?success=password_updated');
                } else {
                    header('Location: resetPassword.php?token='.$token.'&error=update_failed');
                }
                exit;
            }else {
                echo "El token ya se utilizo";
            }
        }
        
    }
?>
