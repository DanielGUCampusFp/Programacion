<?php
require_once '../controlador/UsuariosController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();
    $controller->agregarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['edad'], $_POST['tipo_plan_base'], $_POST['paquetes'], $_POST['duracion_suscripcion']);
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../vista/script.js" defer></script>
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Añadir Socio</h1>
                        <form id="formulario" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="text" id="edad" name="edad" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_plan_base" class="form-label">Tipo de Plan</label>
                                <br>
                                <select id="tipo_plan_base" name="tipo_plan_base" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="Basico">Básico</option>
                                    <option value="Estandar">Estándar</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="paquetes">
                                Paquetes Adicionales
                            </label>
                            <div class="mb-4">
                                <label class="form-check-label">
                                    <input type="checkbox" name="paquetes[]" value="Deporte" class="form-check-input">
                                    Deporte
                                </label>
                                <label class="form-check-label">
                                    <input type="checkbox" name="paquetes[]" value="Cine" class="form-check-input">
                                    Cine
                                </label>
                                <label class="form-check-label">
                                    <input type="checkbox" name="paquetes[]" value="Infantil" class="form-check-input">
                                    Infantil
                                </label>
                            </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion_suscripcion">
                                    Duración de la Suscripción
                                </label>
                                <br>
                                <select id="duracion_suscripcion" name="duracion_suscripcion" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="Mensual">Mensual</option>
                                    <option value="Anual">Anual</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Añadir</button>
                            <br><br>
                            <a href="lista_usuarios.php" class="btn btn-primary w-100">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>