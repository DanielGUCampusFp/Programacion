<?php
require_once '../config/conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarUsuario($usuario, $correo, $contrasena) {
        $passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $correo, $passwordHash);

        if ($stmt->execute()) {
            echo "Usuario agregado con éxito.";
        } else {
            echo "Error al agregar al Usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerUsuarioPorCorreo($correo) {
        $query = "SELECT id, nombre_usuario, contrasena, correo FROM usuarios WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function verificarUsuario($usuario, $contrasena) {
        $query = "SELECT id, contrasena FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $passwordHash);

        if ($stmt->fetch() && password_verify($contrasena, $passwordHash)) {
            return $id;
        } else {
            return false;
        }
    }
}
?>
