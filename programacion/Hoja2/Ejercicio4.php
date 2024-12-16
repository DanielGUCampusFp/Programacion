<?php
// Arrays con nombres y apellidos
$nombres = ["Ana", "Juan", "Carlos", "María", "Luisa", "Miguel", "Sofía", "Pedro", "Elena", "Jorge"];
$apellidos = ["García", "Martínez", "López", "Pérez", "González", "Rodríguez", "Fernández", "Sánchez", "Ramírez", "Torres"];

// Generar un número aleatorio para seleccionar un nombre y un apellido
$indiceNombre = rand(0, count($nombres) - 1);
$indiceApellido = rand(0, count($apellidos) - 1);

// Formar el nombre completo aleatorio
$nombreCompleto = $nombres[$indiceNombre] . " " . $apellidos[$indiceApellido];

// Mostrar el nombre completo generado
echo "Nombre generado aleatoriamente: $nombreCompleto\n";

?>