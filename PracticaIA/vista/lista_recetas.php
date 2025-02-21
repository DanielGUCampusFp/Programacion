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

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff;
    padding: 10px 20px;
    color: white;
    border-radius: 10px;
    margin-bottom: 20px;
}

.navbar img {
    height: 80px;
    width: 110px;
}

.navbar h1 {
    margin: 0;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 28px;
}

.img {
    width: 330px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}
</style>
<body>
    <div class="container mt-5">
        <div class="navbar">
            <img src="data:image/png;base64,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" alt="Logo">
            <h1>LISTADO DE RECETAS</h1>
        </div>
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
            <div class="container mt-5">
                <h1 class="text-center mb-4">Recetas Deliciosas 🍽️</h1>
                <div id="card-container" class="row"></div>
            </div>
        <script>
                const recipes = [
                {
                    name: "Tacos al Pastor",
                    description: "Deliciosos tacos de cerdo marinados con piña y especias mexicanas.",
                    image: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQQ2i72d_L_1l1H9N2-u-pNHsSFkIw56dpeZp7OvZNEQtTvWTus0F_fTOWT-n9-b3fUOvkhLrhq5Lrlll2UsxhklFDKpH6lsyo_tLhMgQ"
                },
                {
                    name: "Pizza Margherita",
                    description: "Clásica pizza italiana con salsa de tomate, mozzarella fresca y albahaca.",
                    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRKMRdnYyIWwUbrKADQ8xMP0sCGQU8phklK5SioDs9xADrsNumDMWJ_1GtIwGxAx_0iPi-CQI8Reswm8e0IQAoE50bhbyXByPjWQRB"
                },
                {
                    name: "Sushi Roll",
                    description: "Rollos de sushi rellenos de aguacate, pepino y salmón fresco.",
                    image: "data:image/jpeg;base64,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"
                }
                ];

                function renderRecipeCards(data) {
                const container = document.getElementById("card-container");
                data.forEach(recipe => {
                    const cardHTML = `
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                        <img src="${recipe.image}" class="card-img-top img" alt="${recipe.name}">
                        <div class="card-body">
                            <h5 class="card-title">${recipe.name}</h5>
                            <p class="card-text">${recipe.description}</p>
                        </div>
                        </div>
                    </div>
                    `;
                    container.innerHTML += cardHTML;
                });
                }

                renderRecipeCards(recipes);
            </script>
        
    </div>
</body>
</html>