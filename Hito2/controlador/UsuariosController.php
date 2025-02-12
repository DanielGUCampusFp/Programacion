<?php
require_once '../modelo/class_usuario.php';

class UsuariosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function agregarUsuario($usuario, $correo, $contrasena) {
        return $this->modelo->agregarUsuario($usuario, $correo, $contrasena);
    }

    public function iniciarSesion($correo, $contrasena) {
        $datosDelUsuario = $this->modelo->obtenerUsuarioPorCorreo($correo);

        if ($datosDelUsuario && password_verify($contrasena, $datosDelUsuario['contrasena'])) {
            session_start();
            $_SESSION['usuario_id'] = $datosDelUsuario['id'];
            header("Location: ../vista/lista_tareas.php");
            exit();
        } else {
            return "Datos equivocados.";
        }
    }

    public function cerrarSesion() {
        session_destroy();
        header("Location: ../vista/login.php");
        exit();
    }
}
?>
