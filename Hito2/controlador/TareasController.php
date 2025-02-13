<?php
// Se requiere el archivo que contiene la clase Tarea
require_once '../modelo/class_tareas.php';

class TareasController {
    private $modelo; // Instancia del modelo Tarea

    // Constructor: inicializa el modelo de Tarea
    public function __construct() {
        $this->modelo = new Tarea();
    }

    // Agrega una nueva tarea llamando al método del modelo
    public function agregarTarea($id, $descripcion) {
        return $this->modelo->agregarTarea($id, $descripcion);
    }

    // Obtiene una tarea por su ID llamando al método del modelo
    public function obtenerTareaPorId($id) {
        return $this->modelo->obtenerTareaPorId($id);
    }

    // Lista todas las tareas de un usuario llamando al método del modelo
    public function listarTareasPorUsuario($id) {
        return $this->modelo->listarTareasPorUsuario($id);
    }

    // Actualiza una tarea llamando al método del modelo
    public function actualizarTarea($id, $descripcion) {
        return $this->modelo->actualizarTarea($id, $descripcion);
    }

    // Elimina una tarea llamando al método del modelo
    public function eliminarTarea($id) {
        return $this->modelo->eliminarTarea($id);
    }

    // Marca una tarea como completada llamando al método del modelo
    public function completarTarea($id) {
        return $this->modelo->completarTarea($id);
    }

    // Marca una tarea como pendiente llamando al método del modelo
    public function pedienteTarea($id) {
        return $this->modelo->pendienteTarea($id);
    }
}
?>
