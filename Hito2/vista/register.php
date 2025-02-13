<?php
require_once '../controlador/UsuariosController.php'; // Incluye el archivo que contiene la lógica para manejar usuarios

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario se envió mediante POST
    $controller = new UsuariosController(); // Crea una nueva instancia del controlador de usuarios
    if ($controller->agregarUsuario($_POST["nombre_usuario"], $_POST["correo"], $_POST["contrasena"])) { 
        // Llama al método 'agregarUsuario' y pasa los datos del formulario
        // Si el usuario se agrega correctamente, redirige a la página de inicio de sesión
        header ("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos -->
</head>
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 92%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <label>
                <input type="checkbox" name="aceptar_politicas" required>
                Acepto las políticas de privacidad
            </label>

            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
