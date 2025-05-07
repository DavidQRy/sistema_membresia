<?php 
    require_once __DIR__.'/../config/conn.php';
    class Usuario {
        private ?mysqli $conn;
        public function __construct(){
            $database = new DataBase;
            $this->conn = $database->connect();
        }
        //Traer Usuarios Contados
        public function contarUsuariosPorEstado(): array {
            $sql = "SELECT estado, COUNT(*) as total FROM usuarios GROUP BY estado";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $datos = [
                'Pendiente' => 0,
                'Aprobado' => 0,
                'Rechazado' => 0
            ];
            
            while ($row = $result->fetch_assoc()) {
                $datos[$row['estado']] = (int)$row['total'];
            }
            
            return $datos;
        }


        public function contarUsuariosPorRoles(): array {
            $sql = "SELECT rol, COUNT(*) as total FROM usuarios GROUP BY rol";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $datos = [
                'SuperAdministrador' => 0,
                'Administrador' => 0,
                'Miembro' => 0
            ];
            
            while ($row = $result->fetch_assoc()) {
                $datos[$row['rol']] = (int)$row['total'];
            }
            
            return $datos;
        }

        // Registrar Usuario
        public function registrarUsuario(string $nombre, string $email, string $password, string $rol): bool{
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt ) {
                return false;
            }
            $stmt->bind_param("ssss", $nombre, $email, $password_hashed, $rol);
            return $stmt->execute();
        }

        // Login Usuario
        public function loginUsuario(string $email, string $password): ?array {
            $sql = "SELECT id, email, password, rol FROM usuarios WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    /*session_start();
                    $_SESSION['usuario_id'] = $user['id'];
                    return true;*/
                    return $user;
                }
            }
            return null;
        }

        //Email existe
        public function emailExiste(string $email): bool {
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        }

        // Generar token de recuperacion
        public function crearTokenRecuperacion(string $email): ?string {
            // Generar token seguro
            $token = bin2hex(random_bytes(32));
            $expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Obtener ID del usuario
            $id_usuario = $this->obtenerIdPorEmail($email);
            if (!$id_usuario) return null;
            
            // Insertar token en la base de datos
            $sql = "INSERT INTO recuperacion_contraseña 
                    (id_usuario, token, fecha_expiracion) 
                    VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iss", $id_usuario, $token, $expiracion);
            
            return $stmt->execute() ? $token : null;
        }
        
        private function obtenerIdPorEmail(string $email): ?int {
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0 ? $result->fetch_assoc()['id'] : null;
        }
    
        /**
         * Actualiza la contraseña de un usuario
         */
        public function actualizarPassword(int $id_usuario, string $nueva_password): bool {
            $hash = password_hash($nueva_password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET password = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("si", $hash, $id_usuario);
            return $stmt->execute();
        }
        /**
         * Valida un token de recuperación
         */
        public function validarTokenRecuperacion(string $token): ?array {
            $sql = "SELECT u.id, u.email 
                    FROM usuarios u
                    JOIN recuperacion_contraseña r ON u.id = r.id_usuario
                    WHERE r.token = ? 
                    AND r.usado = 0
                    AND r.fecha_expiracion > NOW()";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0 ? $result->fetch_assoc() : null;
        }

        /**
         * Marca un token como usado
         */
        public function marcarTokenComoUsado(string $token): bool {
            $sql = "UPDATE recuperacion_contraseña SET usado = 1 WHERE token = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $token);
            return $stmt->execute();
        }

    }
?>
