<?php
require_once '../controlador/RecetasController.php';
$id = $_GET['id'];
$controller = new RecetasController();
$controller->eliminarReceta($id);
header("Location: lista_recetas.php");
exit();
?>
