<?php
// models/CV.php
require_once __DIR__.'/../config/conn.php';

class CV {
    private ?mysqli $conn;

    public function __construct() {
        $database = new DataBase;
        $this->conn = $database->connect();
    }

    // Subir hoja de vida
    public function subirCV(int $idUsuario, string $ruta_pdf): bool {
        $sql = "INSERT INTO hojas_de_vida (id_usuario, ruta_pdf) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("is", $idUsuario, $ruta_pdf);
        return $stmt->execute();
    }

    // Obtener hoja de vida de un usuario
    public function obtenerCV(int $idUsuario): ?array {
        $sql = "SELECT ruta_pdf FROM hojas_de_vida WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
?>