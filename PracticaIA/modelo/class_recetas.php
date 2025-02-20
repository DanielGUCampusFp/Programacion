<?php
require_once '../config/conexion.php';

class Receta {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarReceta($receta, $descripcion) {
        $query = "INSERT INTO recetas (receta, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ss", $receta, $descripcion);
        return $stmt->execute();
        $stmt->close();
    }

    public function listarRecetas() {
        $query = "SELECT * FROM recetas";
        $stmt = $this->conexion->conexion->query($query);
        $recetas = [];
        while ($fila = $stmt->fetch_assoc()) {
            $recetas[] = $fila;
        }
        return $recetas;
        $stmt->close();
    }

    public function eliminarReceta($id) {
        $query = "DELETE FROM recetas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Receta eliminada con éxito.";
        } else {
            echo "Error al eliminar la Receta: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerRecetaPorId($id) {
        $query = "SELECT * FROM recetas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $receta, $descripcion);
        $stmt->fetch();
        $receta = ['id' => $id, 'receta' => $receta, 'descripcion' => $descripcion];
        return $receta;
        $stmt->close();
    }

    public function actualizarReceta($id, $receta, $descripcion) {
        $query = "UPDATE recetas SET receta = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssi", $receta, $descripcion, $id);

        if ($stmt->execute()) {
            echo "Receta actualizada con éxito.";
        } else {
            echo "Error al actualizar la Receta: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
