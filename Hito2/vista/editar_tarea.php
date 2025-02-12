<?php
require_once '../controlador/TareasController.php';
session_start();

if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) {
    header("Location: lista_tareas.php");
    exit();
}

$controller = new TareasController();
$tarea = $controller->obtenerTareaPorId($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->actualizarTarea($_GET['id'], $_POST["descripcion"]);
    header("Location: lista_tareas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Modificar Tarea</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo htmlspecialchars($tarea['descripcion']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Modificar</button>
                            <br><br>
                            <a href="lista_tareas.php" class="btn btn-primary w-100">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>