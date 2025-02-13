<?php
require_once '../controlador/TareasController.php'; // Incluye el archivo controlador que maneja las tareas
session_start(); // Inicia o reanuda la sesión

if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) { // Verifica si el usuario está logueado y si se pasó un ID de tarea en la URL
    header("Location: lista_tareas.php"); // Si no se pasó el ID de tarea o no hay sesión activa, redirige a la lista de tareas
    exit(); // Detiene la ejecución del script después de la redirección
}

$controller = new TareasController(); // Crea una nueva instancia del controlador de tareas
$controller->completarTarea($_GET['id']); // Llama al método 'completarTarea' pasando el ID de la tarea que se quiere completar

header("Location: lista_tareas.php"); // Redirige a la lista de tareas después de completar la tarea
exit(); // Detiene la ejecución del script para evitar cualquier otra acción después de la redirección
?>
