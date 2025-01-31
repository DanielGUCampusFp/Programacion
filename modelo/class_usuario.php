<?php
// Se requiere el archivo de conexión a la base de datos
require_once '../config/conexion.php';

// Definición de la clase Usuario
class Usuario {
    private $conexion; // Propiedad para la conexión a la base de datos

    // Constructor de la clase: inicializa la conexión
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Método para agregar un nuevo usuario a la base de datos
    public function agregarUsuario($nombre, $apellidos, $email, $edad, $tipo_plan_base, $paquetes, $duracion_suscripcion) {
        // Definición de los precios de los paquetes adicionales
        $preciosPaquetes = [
            'Deporte' => 6.99,
            'Cine' => 7.99,
            'Infantil' => 4.99
        ];

        // Inserción del usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, apellidos, email, edad, tipo_plan_base, duracion_suscripcion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssss", $nombre, $apellidos, $email, $edad, $tipo_plan_base, $duracion_suscripcion);

        if ($stmt->execute()) {
            // Obtener el ID del usuario recién insertado
            $ultimo_id = $this->conexion->conexion->insert_id;

            // Insertar los paquetes seleccionados por el usuario
            foreach ($paquetes as $paquete) {
                $precio = isset($preciosPaquetes[$paquete]) ? $preciosPaquetes[$paquete] : 10.00; // Precio por defecto

                $query = "INSERT INTO paquetes (id_usuario, paquetes, precio) VALUES (?, ?, ?)";
                $stmt = $this->conexion->conexion->prepare($query);
                $stmt->bind_param("isd", $ultimo_id, $paquete, $precio);
                $stmt->execute();
            }
        } else {
            echo "Error al agregar al usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    // Método para obtener la lista de todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];

        // Almacenar los resultados en un array
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    // Método para obtener los datos de un usuario por su ID
    public function obtenerUsuarioPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario en un array asociativo
    }

    // Método para actualizar los datos de un usuario
    public function actualizarUsuario($id, $tipo_plan_base, $paquetes, $duracion_suscripcion) { 
        // Definición de los precios de los paquetes
        $preciosPaquetes = [
            'Deporte' => 6.99,
            'Cine' => 7.99,
            'Infantil' => 4.99
        ];

        // Eliminar los paquetes anteriores del usuario antes de actualizarlos
        $query = "DELETE FROM paquetes WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Actualizar el tipo de plan base y la duración de la suscripción
        $query = "UPDATE usuarios SET tipo_plan_base = ?, duracion_suscripcion = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssi", $tipo_plan_base, $duracion_suscripcion, $id);
        $stmt->execute();

        // Insertar los nuevos paquetes seleccionados
        foreach ($paquetes as $paquete) {
            $precio = isset($preciosPaquetes[$paquete]) ? $preciosPaquetes[$paquete] : 10.00; // Precio por defecto
            $queryPaquete = "INSERT INTO paquetes (id_usuario, paquetes, precio) VALUES (?, ?, ?)";
            $stmtPaquete = $this->conexion->conexion->prepare($queryPaquete);
            $stmtPaquete->bind_param("isd", $id, $paquete, $precio);
            $stmtPaquete->execute();
        }
        
        $stmt->close();
    }

    // Método para eliminar un usuario por su ID
    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar al usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    // Método para obtener todos los paquetes disponibles
    public function obtenerPack() {
        $query = "SELECT * FROM paquetes";
        $resultado = $this->conexion->conexion->query($query);
        $paquetes = [];

        // Almacenar los paquetes en un array
        while ($fila = $resultado->fetch_assoc()) {
            $paquetes[] = $fila;
        }
        return $paquetes;
    }
}
?>
