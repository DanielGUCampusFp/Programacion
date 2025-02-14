<?php
// Se incluyen los controladores necesarios para gestionar tareas y usuarios
require_once '../controlador/TareasController.php';
require_once '../controlador/UsuariosController.php';

// Se configuran los parámetros de sesión (duración de 1000 segundos)
session_set_cookie_params(1000);
session_start();

// Se verifica que el usuario haya iniciado sesión
if (!isset($_SESSION["usuario_id"])) {
    // Si no está logueado, se redirige a la página de inicio de sesión
    header("Location: login.php");
    exit(); // Se detiene la ejecución
}

// Se instancia el controlador de tareas
$controller = new TareasController();

// Se obtiene la lista de tareas del usuario autenticado
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
/* Estilos generales */
body {
    background-color: rgb(206, 211, 216);
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

/* Contenedor principal */
.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 80%;
    max-width: 900px;
}

/* Encabezados */
h2, h1 {
    color: #333;
    margin-bottom: 20px;
}

/* Botones */
.btn-danger {
    background-color: #dc3545;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Tabla */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #dee2e6;
}

.table th {
    color: rgb(25, 63, 119);
}

/* Botones de acciones */
.btn-sm {
    padding: 5px 10px;
    font-size: 14px;
    margin: 2px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Clases de alineación */
.text-center {
    text-align: center;
}

.mt-4 {
    margin-top: 20px;
}
</style>
<body>
    <div class="container mt-5">
        <h2>¡Bienvenido!</h2>
        <a href="logout.php" class="btn btn-danger mb-4">Cerrar sesión</a>
        
        <h1 class="text-center mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Lista de Tareas</h1>
        
        <!-- Tabla de tareas -->
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Descripción de la Tarea</th>
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
                            <!-- Botón para editar la tarea -->
                            <a href="editar_tarea.php?id=<?= $tarea['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            
                            <!-- Botón para eliminar la tarea -->
                            <a href="eliminar_tarea.php?id=1" class="btn btn-sm btn-danger" onclick="return confirmarEliminacion();">Eliminar</a>
                            
                            <!-- Botón para marcar como completada si aún no lo está -->
                            <?php if ($tarea['estado'] !== 'Completada'): ?>
                                <a href="marcar_como_completada.php?id=<?= $tarea['id']; ?>" class="btn btn-sm btn-success">Marcar como completada✅</a>
                            <?php endif; ?>
                            
                            <!-- Botón para marcar como pendiente si no lo está -->
                            <?php if ($tarea['estado'] !== 'Pendiente'): ?>
                                <a href="marcar_como_pendiente.php?id=<?= $tarea['id']; ?>" class="btn btn-sm btn-success">Marcar como pendiente❌</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botón para agregar nueva tarea -->
        <div class="text-center mt-4">
            <a href="agregar_tarea.php" class="btn btn-primary mb-4">Agregar Tarea</a>
        </div>
    </div>
</body>
</html>
