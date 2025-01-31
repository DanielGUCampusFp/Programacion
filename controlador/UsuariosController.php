<?php
// Se requiere el archivo que contiene la clase Usuario, la cual interactúa con la base de datos
require_once '../modelo/class_usuario.php';

// Definición de la clase UsuariosController
class UsuariosController {
    private $modelo; // Propiedad para manejar el modelo de usuario

    // Constructor de la clase: inicializa un objeto de la clase Usuario
    public function __construct() {
        $this->modelo = new Usuario();
    }

    // Método para agregar un nuevo usuario a la base de datos
    public function agregarUsuario($nombre, $apellidos, $email, $edad, $tipo_plan_base, $paquetes, $duracion_suscripcion) {
        $this->modelo->agregarUsuario($nombre, $apellidos, $email, $edad, $tipo_plan_base, $paquetes, $duracion_suscripcion);
    }

    // Método para obtener la lista de todos los usuarios
    public function listarUsuarios() {
        return $this->modelo->obtenerUsuarios();
    }

    // Método para obtener un usuario específico por su ID
    public function obtenerUsuarioPorId($id) {
        return $this->modelo->obtenerUsuarioPorId($id);
    }

    // Método para actualizar los datos de un usuario existente
    public function actualizarUsuario($id, $tipo_plan_base, $paquetes, $duracion_suscripcion) {
        $this->modelo->actualizarUsuario($id, $tipo_plan_base, $paquetes, $duracion_suscripcion);
    }

    // Método para eliminar un usuario por su ID
    public function eliminarUsuario($id) {
        $this->modelo->eliminarUsuario($id);
    }

    // Método para obtener la lista de paquetes disponibles
    public function listarPack() {
        return $this->modelo->obtenerPack();
    }
}
?>
