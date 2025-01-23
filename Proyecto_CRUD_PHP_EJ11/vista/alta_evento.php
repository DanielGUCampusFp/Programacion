<?php
require_once '../controlador/EventosController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new EventosController();
    $controller->agregarEvento($_POST['nombre_evento'], $_POST['fecha'], $_POST['lugar']);
    header("Location: lista_eventos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Añadir Evento</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nombre_evento" class="form-label">Nombre del Evento</label>
                                <input type="text" id="nombre_evento" name="nombre_evento" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" id="fecha" name="fecha" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="lugar" class="form-label">Lugar</label>
                                <input type="text" id="lugar" name="lugar" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Añadir</button>
                            <br><br>
                            <a href="lista_eventos.php" class="btn btn-primary w-100">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>