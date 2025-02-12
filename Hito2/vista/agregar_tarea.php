<?php
require_once '../controlador/TareasController.php';
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TareasController();
    $controller->agregarTarea($_SESSION["usuario_id"], $_POST["descripcion"]);
    header("Location: lista_tareas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Agregar Nueva Tarea</h1>
    <form method="POST">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" required>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Agregar Tarea">
    </form>
</body>
</html>