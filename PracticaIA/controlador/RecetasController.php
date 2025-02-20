<?php
require_once '../modelo/class_recetas.php';

class RecetasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Receta();
    }

    public function agregarReceta($receta, $descripcion) {
        return $this->modelo->agregarReceta($receta, $descripcion);
    }

    public function listarRecetas() {
        return $this->modelo->listarRecetas();
    }

    public function obtenerRecetaPorId($id) {
        return $this->modelo->obtenerRecetaPorId($id);
    }

    public function actualizarReceta($id, $receta, $descripcion) {
        return $this->modelo->actualizarReceta($id, $receta, $descripcion);
    }

    public function eliminarReceta($id) {
        return $this->modelo->eliminarReceta($id);
    }
}
?>
