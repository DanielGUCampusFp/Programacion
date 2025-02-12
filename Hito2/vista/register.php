<?php
require_once '../controlador/UsuariosController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new UsuariosController();
    if ($controller->agregarUsuario($_POST["nombre_usuario"], $_POST["correo"], $_POST["contrasena"])) {
    header ("Location: login.php");
    } else {
    echo "Error al registrar al usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="text" id="contrasena" name="contrasena" required>

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
