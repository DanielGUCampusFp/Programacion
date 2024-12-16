<?php
require_once '../funciones.php';

$archivo = "../datos/clientes.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $clientes = leerClientes($archivo);
    $clientesActualizados = array_filter($clientes, function($cliente) use ($id) {
        return $cliente[0] != $id;
    });
    escribirClientes($archivo, $clientesActualizados);
    echo "<h1>Cliente eliminado con éxito</h1>";
    echo "<a href='../index.php?opcion=clientes' class='btn btn-primary mt-3'>Volver al listado</a>";
} else {
    echo "<h1>Error: No se recibió un ID válido.</h1>";
    echo "<a href='../index.php?opcion=clientes' class='btn btn-primary mt-3'>Volver al listado</a>";
}
?>
