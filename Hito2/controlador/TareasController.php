<?php
require_once '../modelo/class_tareas.php';

class TareasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Tarea();
    }

    public function agregarTarea($id, $descripcion) {
        return $this->modelo->agregarTarea($id, $descripcion);
    }

    public function obtenerTareaPorId($id) {
        return $this->modelo->obtenerTareaPorId($id);
    }

    public function listarTareasPorUsuario($id) {
        return $this->modelo->listarTareasPorUsuario($id);
    }

    public function actualizarTarea($id, $descripcion) {
        return $this->modelo->actualizarTarea($id, $descripcion);
    }

    public function eliminarTarea($id) {
        return $this->modelo->eliminarTarea($id);
    }

    public function completarTarea($id) {
        return $this->modelo->completarTarea($id);
    }

    public function pedienteTarea($id) {
        return $this->modelo->obtenerTareaPorId($id);
    }
}
?>
