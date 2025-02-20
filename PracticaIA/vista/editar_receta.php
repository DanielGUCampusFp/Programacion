<?php
require_once '../controlador/RecetasController.php';

$controller = new RecetasController();
$receta = $controller->obtenerRecetaPorId($_GET['id']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->actualizarReceta($_GET['id'], $_POST["receta"], $_POST["descripcion"]);
    header("Location: lista_recetas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Receta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Modificar Receta</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="receta" class="form-label">Receta</label>
                                <input type="text" id="receta" name="receta" class="form-control" 
                                    value="<?php echo htmlspecialchars($receta['receta']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" 
                                    value="<?php echo htmlspecialchars($receta['descripcion']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-3">Modificar</button>
                            <a href="lista_recetas.php" class="btn btn-primary w-100">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
