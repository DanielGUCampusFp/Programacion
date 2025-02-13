<?php
// Se incluye el controlador de usuarios
require_once '../controlador/UsuariosController.php';
session_start(); // Se inicia la sesión

// Se verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se instancia el controlador de usuarios
    $controller = new UsuariosController();
    // Se intenta iniciar sesión con los datos recibidos
    echo $controller->iniciarSesion($_POST["correo"], $_POST["contrasena"]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    /* Estilo general para el fondo y la fuente */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    /* Centrado del contenedor de la tarjeta */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Estilo para la tarjeta de inicio de sesión */
    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        background-color: #ffffff;
    }

    /* Estilo para el encabezado de la tarjeta */
    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    /* Estilo para el título en el encabezado */
    .card-header h2 {
        margin: 0;
        font-size: 24px;
    }

    /* Estilo para el cuerpo de la tarjeta */
    .card-body {
        padding: 20px;
    }

    /* Estilo para los campos del formulario */
    .form-group {
        margin-bottom: 15px;
    }

    /* Estilo para los campos de texto */
    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    /* Estilo para el botón de inicio de sesión */
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    /* Estilo para el efecto hover del botón */
    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Estilo para el pie de la tarjeta */
    .card-footer {
        background-color: #f8f9fa;
        border-radius: 0 0 10px 10px;
        padding: 15px;
        font-size: 14px;
    }

    /* Estilo para los enlaces del pie de la tarjeta */
    .card-footer a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    /* Estilo para el efecto hover del enlace */
    .card-footer a:hover {
        text-decoration: underline;
    }

</style>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <!-- Encabezado de la tarjeta -->
                    <div class="card-header text-center">
                        <h2>Iniciar Sesión</h2>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de inicio de sesión -->
                        <form method="POST">
                            <!-- Campo para el correo electrónico -->
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <!-- Campo para la contraseña -->
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                    <!-- Pie de la tarjeta con enlace a registro -->
                    <div class="card-footer text-center">
                        <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
