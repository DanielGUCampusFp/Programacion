<?php
// Se requiere el archivo que contiene la clase Usuario
require_once '../modelo/class_usuario.php';

class UsuariosController {
    private $modelo; // Instancia del modelo Usuario

    // Constructor: inicializa el modelo de Usuario
    public function __construct() {
        $this->modelo = new Usuario();
    }

    // Agrega un nuevo usuario llamando al método del modelo
    public function agregarUsuario($usuario, $correo, $contrasena) {
        return $this->modelo->agregarUsuario($usuario, $correo, $contrasena);
    }

    // Inicia sesión verificando las credenciales del usuario
    public function iniciarSesion($correo, $contrasena) {
        // Obtiene los datos del usuario a partir del correo
        $datosDelUsuario = $this->modelo->obtenerUsuarioPorCorreo($correo);

        // Verifica si el usuario existe y si la contraseña es correcta
        if ($datosDelUsuario && password_verify($contrasena, $datosDelUsuario['contrasena'])) {
            session_start(); // Inicia la sesión
            $_SESSION['usuario_id'] = $datosDelUsuario['id']; // Guarda el ID del usuario en la sesión
            header("Location: ../vista/lista_tareas.php"); // Redirige a la lista de tareas
            exit();
        } else {
            return "Datos equivocados."; // Mensaje de error en caso de credenciales incorrectas
        }
    }

    // Cierra la sesión del usuario
    public function cerrarSesion() {
        session_destroy(); // Destruye la sesión actual
        header("Location: ../vista/login.php"); // Redirige a la página de inicio de sesión
        exit();
    }
}
?>
