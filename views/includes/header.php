<?php

$rol = $_SESSION['rol'];
switch ($rol) {
    case 'Miembro':
        include_once "headerMiembro.php";
        break;
    case 'Administrador':
        include_once  "headerAdmin.php";
        break;
    case 'SuperAdministrador':
        include_once "headerSuperAdmin.php";
        break;
    default:
        header('Location: login.php');
        break;
}
?>