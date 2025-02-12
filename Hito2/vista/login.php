<?php
require_once '../controlador/UsuariosController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new UsuariosController();
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
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="POST">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
