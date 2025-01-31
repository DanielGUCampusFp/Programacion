<?php
require_once '../controlador/UsuariosController.php';
$id = $_GET['id'];
$controller = new UsuariosController();
$controller->eliminarUsuario($id);
header("Location: lista_usuarios.php");
exit();
?>