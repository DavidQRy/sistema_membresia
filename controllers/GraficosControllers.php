<?php
require_once __DIR__.'/../models/Usuario.php';

class GraficoController {
    private $usuarioModel;
    
    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    
    public function mostrarGraficoEstados() {
        $datos = $this->usuarioModel->contarUsuariosPorEstado();
        
        // Puedes devolver los datos como JSON para AJAX o procesarlos aquí
        return $datos;
    }

    public function mostrarGraficoRoles() {
        $datos = $this->usuarioModel->contarUsuariosPorRoles();
        
        // Puedes devolver los datos como JSON para AJAX o procesarlos aquí
        return $datos;
    }
}
?>