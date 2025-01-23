<?php
require_once '../controlador/SociosController.php';
$id_socio = $_GET['id'];
$controller = new SociosController();
$controller->eliminarSocio($id_socio);
header("Location: lista_socios.php");
exit();
?>