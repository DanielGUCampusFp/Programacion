<?php
require_once '../controlador/TareasController.php';
session_start();

if (!isset($_SESSION["usuario_id"])) {
    // Si el usuario no está logueado, redirigimos al inicio de sesión
    header("Location: login.php");
    exit();
}
$controller = new TareasController();
$controller->listarTareasPorUsuario($_SESSION["usuario_id"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión de Tareas</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?= htmlspecialchars($_SESSION["nombre_usuario"]); ?>!</h2>
        <a href="logout.php">Cerrar sesión</a>

        <h3>Tareas Pendientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tareas = $controller->listarTareasPorUsuario($_SESSION["usuario_id"]);
                if (is_array($tareas)): 
                    foreach ($tareas as $tarea): 
                ?>
                    <tr>
                        <td><?= htmlspecialchars($tarea['titulo']); ?></td>
                        <td><?= htmlspecialchars($tarea['estado']); ?></td>
                        <td>
                    <?php endforeach; 
                endif; 
                ?>
                            <a href="eliminar_tarea.php?id=<?= $tarea['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
            </tbody>
        </table>

        <h3>Agregar Nueva Tarea</h3>
        <form action="agregar_tarea.php" method="POST">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <button type="submit">Agregar Tarea</button>
        </form>
    </div>
</body>
</html>
