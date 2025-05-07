<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit;
}


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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Navigation -->
        <?php require_once "includes/header.php"?>

        <!-- Main Content -->
        <main class="main-content">
            <section>
            <div class="login-container">
                <div class="login-card">
                    <h3 class="login-title">Visualizar Gráficos</h3>
        
                    <form action="" method="GET" class="mb-4">
                        <div class="mb-4">
                            <label for="grafico" class="form-label">Seleccione el gráfico:</label>
                            <select name="grafico" id="grafico" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Seleccione --</option>
                                <option value="graficoEstados" <?= isset($_GET['grafico']) && $_GET['grafico'] == 'graficoEstados' ? 'selected' : '' ?>>Grafico Estados</option>
                                <option value="graficoRoles" <?= isset($_GET['grafico']) && $_GET['grafico'] == 'graficoRoles' ? 'selected' : '' ?>>Grafico Roles</option>
                                <option value="actividad" <?= isset($_GET['grafico']) && $_GET['grafico'] == 'actividad' ? 'selected' : '' ?>>Actividad reciente</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-9"> 

                    <?php
                    if ($_SESSION['rol']=="SuperAdministrador" || $_SESSION['rol']=="Administrador") {
                        //include_once "includes/panelAdmins.php";
                        if (isset($_GET['grafico'])) {
                            
                            $grafico = $_GET['grafico'];
                            switch ($grafico) {
                                case 'graficoEstados':
                                    // Incluye el controlador y obtén los datos
                                    require_once __DIR__.'/../controllers/GraficosControllers.php';
                                    $graficoController = new GraficoController();
                                    $datosEstados = $graficoController->mostrarGraficoEstados();
                                    include_once "./includes/graficoEstados.php";
                                    break;
                                case 'graficoRoles':
                                    require_once __DIR__.'/../controllers/GraficosControllers.php';
                                    $graficoController = new GraficoController();
                                    $datosRoles = $graficoController->mostrarGraficoRoles();
                                    include_once  "./includes/graficoRoles.php";
                                    break;
                                case 'SuperAdministrador':
                                    include_once "headerSuperAdmin.php";
                                    break;
                                default:
                                    //header('Location: login.php');
                                    break;
                            }
                        }
                    }
                        ?>
                </div>
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
