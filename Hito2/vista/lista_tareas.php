<?php
require_once '../controlador/TareasController.php';
session_start();

if (!isset($_SESSION["usuario_id"])) {
    // Si el usuario no está logueado, redirigimos al inicio de sesión
    header("Location: login.php");
    exit();
}

$controller = new TareasController();
$tareas = $controller->listarTareasPorUsuario($_SESSION["usuario_id"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        li {
            margin: 0 15px;
        }
        a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?= isset($_SESSION["nombre_usuario"]) ? htmlspecialchars($_SESSION["nombre_usuario"]) : 'Usuario'; ?>!</h2>
        <a href="logout.php" class="btn btn-danger mb-4">Cerrar sesión</a>
        <h1 class="text-center mb-4">Lista de Tareas</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Descripcion de la Tarea</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['id'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td><?= $tarea['estado'] ?></td>
                        <td>
                            <?php if ($tarea['estado'] !== 'completada'): ?>
                                <a href="marcar_como_completada.php?id=<?= $tarea['id']; ?>" class="btn btn-sm btn-success">Marcar como completada</a>
                            <?php endif; ?>
                            <a href="editar_tarea.php?id=<?= $tarea['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar_tarea.php?id=<?= $tarea['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="agregar_tarea.php" class="btn btn-success mb-4">Agregar Tarea</a>
        </div>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
