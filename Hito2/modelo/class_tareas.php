<?php
require_once '../config/conexion.php';

class Tarea {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarTarea($id, $descripcion) {
        $query = "INSERT INTO tareas (usuario_id, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("is", $id, $descripcion);
        return $stmt->execute();
    }

    public function obtenerTareaPorId($id) {
        $query = "SELECT descripcion FROM tareas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function listarTareasPorUsuario($id) {
        $query = "SELECT id, descripcion, estado FROM tareas WHERE usuario_id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function actualizarTarea($id, $descripcion) {
        $query = "UPDATE tareas SET descripcion = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("si", $descripcion, $id);

        if ($stmt->execute()) {
            echo "Tarea actualizado con éxito.";
        } else {
            echo "Error al actualizar a la Tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function eliminarTarea($id) {
        $query = "DELETE FROM tareas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea eliminado con éxito.";
        } else {
            echo "Error al eliminar a la Tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function pendienteTarea($id) {
        $query = "UPDATE tareas SET estado = 'pendiente' WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea pendiente con éxito.";
        } else {
            echo "Error al pendiente a la Tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function completarTarea($id) {
        $query = "UPDATE tareas SET estado = 'completada' WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea completada con éxito.";
        } else {
            echo "Error al completar la Tarea: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
