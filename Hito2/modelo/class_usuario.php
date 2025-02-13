<?php
// Se requiere el archivo de conexión a la base de datos
require_once '../config/conexion.php';

class Usuario {
    private $conexion; // Propiedad para almacenar la conexión a la base de datos

    // Constructor: inicializa la conexión con la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarUsuario($usuario, $correo, $contrasena) {
        // Se cifra la contraseña antes de almacenarla en la base de datos
        $passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Consulta SQL para insertar un nuevo usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $correo, $passwordHash);

        try {
            // Se ejecuta la consulta preparada
            if ($stmt->execute()) {
                return "Usuario agregado con éxito.";
            } else {
                // Manejo de errores en caso de que el correo ya esté registrado (error 1062: clave duplicada)
                if ($stmt->errno == 1062) {
                    echo "Error: El correo ya está registrado.";
                } else {
                    echo "Error al agregar al Usuario: " . $stmt->error;
                }
            }
        } catch (Exception $e) {
            // Captura de excepciones en caso de error inesperado
            echo "Error al agregar al Usuario: " . $e->getMessage();
        }

        // Se cierra la consulta
        $stmt->close();
    }

    public function obtenerUsuarioPorCorreo($correo) {
        $query = "SELECT id, nombre_usuario, contrasena, correo FROM usuarios WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        
        // Se retorna el resultado de la consulta en forma de array asociativo
        return $stmt->get_result()->fetch_assoc();
    }

    public function verificarUsuario($usuario, $contrasena) {
        $query = "SELECT id, contrasena FROM usuarios WHERE id = ?"; // Posible error: debería buscar por correo, no por id
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $passwordHash);

        // Verifica si se encontró el usuario y si la contraseña ingresada es válida
        if ($stmt->fetch() && password_verify($contrasena, $passwordHash)) {
            return $id; // Devuelve el ID del usuario autenticado
        } else {
            return false; // Si la autenticación falla, devuelve false
        }
    }
}
?>
