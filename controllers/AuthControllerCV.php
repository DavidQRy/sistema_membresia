<?php
require_once __DIR__ . "/../models/CV.php";

class AuthControllerCV {
    private CV $CV;

    public function __construct() {
        $this->CV = new CV();
        
    }

    public function subirCV() {
        session_start();
        if (!isset($_SESSION['id'])) {
            header("Location: ../views/login.php");
            exit;
        }

        if (isset($_FILES['archivo']) && ($_FILES['archivo']['type'] == 'application/pdf' || $_FILES['archivo']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
            $directorioDestino = "../uploads/";
            $nombreArchivo = time() . "_" . basename($_FILES["archivo"]["name"]);
            $rutaArchivo = $directorioDestino . $nombreArchivo;

            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo)) {
                if ($this->CV->subirCV($_SESSION['id'], $rutaArchivo)) {
                    header("Location: ../views/upload_cv.php?success=Archivo subido correctamente");
                    exit;
                } else {
                    header("Location: ../views/upload_cv.php?error=Error al guardar en la base de datos");
                    exit;
                }
            } else {
                header("Location: ../views/upload_cv.php?error=Error al subir el archivo");
                exit;
            }
        } else {
            header("Location: ../views/upload_cv.php?error=Formato no válido. Solo se permiten archivos PDF o DOCX.");
            exit;
        }
    }

    public function obtenerCV (int $idUsuario){
        $cv = new CV;
        $sql = "SELECT FROM ";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new AuthControllerCV();
    $controller->subirCV();
}
?>
