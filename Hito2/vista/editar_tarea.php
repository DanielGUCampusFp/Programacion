<?php
// Se requiere el controlador de tareas para manejar la lógica de negocio
require_once '../controlador/TareasController.php';

// Se inicia la sesión para verificar la autenticación del usuario
session_start();

// Se verifica si el usuario ha iniciado sesión y si se ha proporcionado un ID de tarea válido
if (!isset($_SESSION["usuario_id"]) || !isset($_GET['id'])) {
    header("Location: lista_tareas.php"); // Si no, redirige a la lista de tareas
    exit(); // Se detiene la ejecución
}

// Se crea una instancia del controlador de tareas
$controller = new TareasController();

// Se obtiene la información de la tarea a modificar
$tarea = $controller->obtenerTareaPorId($_GET['id']);

// Si el formulario es enviado por método POST, se actualiza la tarea
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->actualizarTarea($_GET['id'], $_POST["descripcion"]); // Actualiza la tarea con la nueva descripción
    header("Location: lista_tareas.php"); // Redirige a la lista de tareas
    exit(); // Se detiene la ejecución
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Tarea</title>
    <!-- Se incluye Bootstrap para estilos y diseño responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Modificar Tarea</h1>
                        
                        <!-- Formulario para modificar la tarea -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <!-- Campo de entrada con el valor actual de la tarea -->
                                <input type="text" id="descripcion" name="descripcion" class="form-control" 
                                    value="<?php echo htmlspecialchars($tarea['descripcion']); ?>" required>
                            </div>
                            <!-- Botón para enviar el formulario y modificar la tarea -->
                            <button type="submit" class="btn btn-primary w-100">Modificar</button>
                            <br><br>
                            <!-- Botón para volver a la lista de tareas -->
                            <a href="lista_tareas.php" class="btn btn-primary w-100">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
