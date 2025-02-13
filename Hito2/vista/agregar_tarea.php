<?php
// Se requiere el controlador de tareas para manejar la lógica de negocio
require_once '../controlador/TareasController.php';

// Se inicia la sesión para gestionar la autenticación del usuario
session_start();

// Verifica si el usuario ha iniciado sesión, si no, lo redirige a la página de login
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit(); // Se detiene la ejecución para evitar que el código continúe ejecutándose
}

// Verifica si el formulario ha sido enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TareasController(); // Se crea una instancia del controlador de tareas
    $controller->agregarTarea($_SESSION["usuario_id"], $_POST["descripcion"]); // Se agrega la tarea con los datos del formulario
    header("Location: lista_tareas.php"); // Redirige a la lista de tareas después de agregar una nueva
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <!-- Se incluye el framework Bootstrap para estilos y diseño responsivo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<style>
/* Estilos generales de la página */
body {
    background-color: #f8f9fa; /* Color de fondo claro */
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    padding: 20px;
    text-align: center;
}

/* Estilo del título */
h1 {
    color: #333;
    margin-bottom: 20px;
}

/* Estilos del formulario */
form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: left;
}

/* Estilos de las etiquetas */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Estilos de los campos de entrada */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

/* Estilos del botón */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    width: 100%;
    height: 20%;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Efecto al pasar el cursor sobre el botón */
.btn-primary:hover {
    background-color: #0056b3;
}
</style>

<body>
    <h1>AGREGAR NUEVA TAREA</h1>
    
    <!-- Formulario para agregar una nueva tarea -->
    <form method="POST">
        <label for="descripcion">Descripción de la tarea:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" required>
        
        <!-- Botón para enviar el formulario y agregar la tarea -->
        <input type="submit" class="btn btn-primary" value="Agregar Tarea">
        
        <br><br>
        
        <!-- Botón para volver a la lista de tareas -->
        <input type="button" class="btn btn-primary" value="Volver" onclick="location.href='lista_tareas.php';">
    </form>
</body>
</html>
