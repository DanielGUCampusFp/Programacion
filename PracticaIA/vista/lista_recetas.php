<?php
require_once '../controlador/recetasController.php';

$recetas = new recetasController();
$recetas = $recetas->listarRecetas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
body {
    background-color: rgb(206, 211, 216);
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 80%;
    max-width: 1400px;
}

h2, h1 {
    color: #333;
    margin-bottom: 20px;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-danger:hover {
    background-color: #c82333;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 10px;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #dee2e6;
}

.table th {
    color: rgb(25, 63, 119);
}

.btn-sm {
    padding: 5px 10px;
    font-size: 14px;
    margin: 2px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.text-center {
    text-align: center;
}

.mt-4 {
    margin-top: 20px;
}
</style>
<body>
    <div class="container mt-5">   
        <h1 class="text-center mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Lista de recetas</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Receta</th>
                    <th>Descripción de la Receta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recetas as $receta): ?>
                    <tr>
                        <td><?= $receta['receta'] ?></td>
                        <td><?= $receta['descripcion'] ?></td>
                        <td>
                            <a href="editar_receta.php?id=<?= $receta['id']?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar_receta.php?id=<?= $receta['id']?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="agregar_receta.php" class="btn btn-primary mb-4">Agregar receta</a>
        </div>
    </div>
</body>
</html>
