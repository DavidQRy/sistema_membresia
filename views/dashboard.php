<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit;
}

require_once __DIR__ . "/../models/CV.php";

$cv = new CV();
$ruta_pdf = $cv->obtenerCV($_SESSION['id']);


?>

<?php
//session_start();
// Verificar autenticación y rol aquí
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/styleDashboard.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Navigation -->
        <?php require_once "includes/header.php"?>

        <!-- Main Content -->
        <main class="main-content">
            <?php
            if ($_SESSION['rol']=="SuperAdministrador" || $_SESSION['rol']=="Administrador") {
                include_once "includes/panelAdmins.php";
            }
            ?>
            <section>

                    <!-- Mostrar Hoja de Vida -->
            <?php if ($ruta_pdf && !empty($ruta_pdf['ruta_pdf'])): ?>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Hoja de Vida</h4>
                            </div>
                            <div class="card-body">
                                <iframe src="<?= htmlspecialchars($ruta_pdf['ruta_pdf']) ?>" width="100%" height="600px">
                                    <p>Tu navegador no soporta iframes. <a href="<?= htmlspecialchars($ruta_pdf['ruta_pdf']) ?>">Descargar PDF</a></p>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center mt-4">No has subido ninguna hoja de vida aún.</p>
            <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

    <!--footer -->
    <?php include_once "includes/footer.php"?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
