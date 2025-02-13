<?php
// Se requiere el archivo de conexión a la base de datos
require_once '../config/conexion.php';

class Tarea {
    private $conexion; // Conexión a la base de datos

    // Constructor: inicializa la conexión con la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Agrega una nueva tarea para un usuario
    public function agregarTarea($id, $descripcion) {
        $query = "INSERT INTO tareas (usuario_id, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("is", $id, $descripcion);
        return $stmt->execute(); // Retorna true si la inserción fue exitosa
    }

    // Obtiene una tarea por su ID
    public function obtenerTareaPorId($id) {
        $query = "SELECT descripcion FROM tareas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc(); // Devuelve un array asociativo con los datos de la tarea
    }

    // Lista todas las tareas de un usuario
    public function listarTareasPorUsuario($id) {
        $query = "SELECT id, descripcion, estado FROM tareas WHERE usuario_id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Devuelve un array con todas las tareas del usuario
    }

    // Actualiza la descripción de una tarea
    public function actualizarTarea($id, $descripcion) {
        $query = "UPDATE tareas SET descripcion = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("si", $descripcion, $id);

        if ($stmt->execute()) {
            echo "Tarea actualizada con éxito.";
        } else {
            echo "Error al actualizar la tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    // Elimina una tarea por su ID
    public function eliminarTarea($id) {
        $query = "DELETE FROM tareas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea eliminada con éxito.";
        } else {
            echo "Error al eliminar la tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    // Marca una tarea como "Pendiente"
    public function pendienteTarea($id) {
        $query = "UPDATE tareas SET estado = 'Pendiente' WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea marcada como pendiente.";
        } else {
            echo "Error al marcar la tarea como pendiente: " . $stmt->error;
        }

        $stmt->close();
    }

    // Marca una tarea como "Completada"
    public function completarTarea($id) {
        $query = "UPDATE tareas SET estado = 'Completada' WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea completada con éxito.";
        } else {
            echo "Error al completar la tarea: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
