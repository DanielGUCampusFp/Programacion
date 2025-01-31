<?php
require_once '../controlador/UsuariosController.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();
    $controller->actualizarUsuario($id, $_POST['tipo_plan_base'], $_POST['paquetes'], $_POST['duracion_suscripcion']);
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Modificar Usuario</h1>
                        <form method="POST">
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
                                <label class="flex items-center">
                                    <input type="checkbox" name="paquetes[]" value="Deporte" class="mr-2">
                                    Deporte
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="paquetes[]" value="Cine" class="mr-2">
                                    Cine
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="paquetes[]" value="Infantil" class="mr-2">
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
                            <button type="submit" class="btn btn-primary w-100">Modificar</button>
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