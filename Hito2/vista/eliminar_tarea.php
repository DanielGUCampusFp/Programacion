<?php
require_once '../controlador/TareasController.php';
session_start();

if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) {
    header("Location: lista_tareas.php");
    exit();
}

$controller = new TareasController();
$controller->eliminarTarea($_GET['id']);

header("Location: lista_tareas.php");
?>