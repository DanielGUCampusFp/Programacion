<?php
require_once '../controlador/EventosController.php';
$id_evento = $_GET['id'];
$controller = new EventosController();
$controller->eliminarEvento($id_evento);
header("Location: lista_eventos.php");
exit();
?>