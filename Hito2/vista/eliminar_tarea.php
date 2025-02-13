<?php
// Se requiere el controlador de tareas para manejar la eliminación
require_once '../controlador/TareasController.php';

// Se inicia la sesión para verificar la autenticación del usuario
session_start();

// Se verifica que el usuario haya iniciado sesión y que se haya proporcionado un ID de tarea
if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) {
    header("Location: lista_tareas.php"); // Si no, redirige a la lista de tareas
    exit(); // Se detiene la ejecución
}

// Se crea una instancia del controlador de tareas
$controller = new TareasController();

// Se elimina la tarea con el ID recibido por GET
$controller->eliminarTarea($_GET['id']);

// Se redirige a la lista de tareas después de la eliminación
header("Location: lista_tareas.php");
?>
