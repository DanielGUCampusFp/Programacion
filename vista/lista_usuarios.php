<?php
require_once '../controlador/UsuariosController.php';
require_once '../config/conexion.php';
$conexion = new Conexion();
$controller = new UsuariosController();

$usuarios = $controller->listarUsuarios();
$packs = $controller->listarPack();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        li {
            margin: 0 15px;
        }
        a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
            <h1 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-center mb-4">Planes Disponibles</h1>
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Tipo de Plan</th>
                            <th>Precio Mensual (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Plan Básico (1 dispositivo)</td>
                            <td>9,99 €</td>
                        </tr>
                        <tr>
                            <td>Plan Estándar (2 dispositivos)</td>
                            <td>13,99 €</td>
                        </tr>
                        <tr>
                            <td>Plan Premium (4 dispositivos)</td>
                            <td>17,99 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h1 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-center mb-4">Packs Disponibles</h1>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Pack</th>
                                <th>Precio Mensual (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Deporte</td>
                                <td>6,99 €</td>
                            </tr>
                            <tr>
                                <td>Cine</td>
                                <td>7,99 €</td>
                            </tr>
                            <tr>
                                <td>Infantil</td>
                                <td>4,99 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-center mb-4">Usuarios Registrados</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Edad</th>
                    <th class="text-center">Tipo de Plan</th>
                    <th class="text-center">Paquetes Adicionales</th>
                    <th class="text-center">Duración de la Suscripción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['apellidos'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['edad'] ?></td>
                        <td><?= $usuario['tipo_plan_base'] ?></td>
                        <td>
                            <?php         
                                $usuarioFinal = $usuario['id'];
                                $query = "SELECT paquetes FROM paquetes WHERE id_usuario = $usuarioFinal";
                                $resultado = $conexion->conexion->query($query);

                                while ($fila = $resultado->fetch_assoc()) {
                                    echo $fila['paquetes'] . " ";
                                }
                            ?>
                        </td>
                        <td><?= $usuario['duracion_suscripcion'] ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="precio_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-info">Factura</a>
                            <a href="eliminar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="alta_usuario.php" class="btn btn-success mb-4">Agregar un nuevo Usuario</a>
        </div>
    </div>
</body>
</html>
