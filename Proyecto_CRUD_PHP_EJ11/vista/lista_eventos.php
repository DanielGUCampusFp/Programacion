<?php
require_once '../controlador/EventosController.php';
$controller = new EventosController();
$eventos = $controller->listarEventos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Eventos</title>
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
    <nav>
        <ul>
            <li><a href="../vista/lista_socios.php">Socios</a></li>
            <li><a href="../vista/lista_eventos.php">Eventos</a></li>
        </ul>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eventos Registrados</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Evento</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                    <tr>
                        <td><?= $evento['id_evento'] ?></td>
                        <td><?= $evento['nombre_evento'] ?></td>
                        <td><?= $evento['fecha'] ?></td>
                        <td><?= $evento['lugar'] ?></td>
                        <td>
                            <a href="editar_evento.php?id=<?= $evento['id_evento'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar_evento.php?id=<?= $evento['id_evento'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="alta_evento.php" class="btn btn-success mb-4">Agregar un nuevo Evento</a>
        </div>
    </div>
</body>
</html>
