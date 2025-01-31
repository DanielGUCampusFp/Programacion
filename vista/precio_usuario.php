<?php
// Se incluyen los archivos necesarios: el controlador de usuarios y la configuración de la base de datos
require_once '../controlador/UsuariosController.php';
require_once '../config/conexion.php';

// Se establece la conexión con la base de datos
$conexion = new Conexion();

// Se crea una instancia del controlador de usuarios
$controller = new UsuariosController();

// Se obtiene el ID del usuario
$id = $_GET['id'];

// Se obtiene la información del usuario a partir de su ID
$usuarios = $controller->obtenerUsuarioPorId($id);

// Se realiza una consulta para obtener los paquetes contratados por el usuario y sus precios
$query = "SELECT paquetes, precio FROM paquetes WHERE id_usuario = $id";
$resultado = $conexion->conexion->query($query);

// Se almacena la información de los paquetes en un array
$paquetes = [];
while ($fila = $resultado->fetch_assoc()) {
    $paquetes[] = $fila;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Facturas</h1>
        
        <!-- Tarjeta con la información del usuario -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">Datos del Usuario</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $usuarios['id']; ?></td>
                            <td><?= $usuarios['nombre']; ?></td>
                            <td><?= $usuarios['apellidos']; ?></td>
                            <td><?= $usuarios['email']; ?></td>
                            <td><?= $usuarios['edad']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tarjeta con la lista de paquetes contratados por el usuario -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">Paquetes Contratados</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Paquete Contratado</th>
                            <th>Precio Mensual (€)</th>
                        </tr>
                    </thead>
                    <tbody id="paquetes-list">
                        <?php foreach ($paquetes as $paquete): ?>
                            <tr>
                                <td><?= $paquete['paquetes'] ?></td>
                                <td><?= number_format($paquete['precio'], 2) ?>€</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Sección donde se mostrará el costo del plan base y el total -->
        <div class="text-center">
            <h4 class="text-secondary">Precio del Plan: 
                <span id="plan-base-cost" class="fw-bold"></span>
            </h4>
            <h2 id="total-cost" class="text-center fw-bold"></h2>
        </div>
        
        <!-- Botón para regresar a la lista de usuarios -->
        <div class="text-center mt-4">
            <a href="lista_usuarios.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <!-- Se pasa la información de los paquetes y el tipo de plan a JavaScript -->
    <script>
        const paquetes = <?= json_encode($paquetes) ?>;
        const planBase = "<?= $usuarios['tipo_plan_base'] ?>";
    </script>

    <!-- Se enlaza el script para calcular el costo total -->
    <script src="calculo.js"></script>
</body>
</html>
