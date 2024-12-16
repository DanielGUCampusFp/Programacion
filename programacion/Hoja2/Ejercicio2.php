<?php

$numeros = [];

// Recorrer el array rellenando los espacios con numeros aleatorios y guardandolos en un array
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(1, 100);
}

// Mostrar el array original
echo "Array original:\n";
print_r($numeros);

// Ordenar a modo de burbuja
for ($i = 0; $i < count($numeros) - 1; $i++) {
    for ($j = 0; $j < count($numeros) - $i - 1; $j++) {
        // Intercambiar si el elemento actual es mayor que el siguiente
        if ($numeros[$j] > $numeros[$j + 1]) {
            $temp = $numeros[$j];
            $numeros[$j] = $numeros[$j + 1];
            $numeros[$j + 1] = $temp;
        }
    }
}

echo "Array ordenado de forma ascendente:\n";
print_r($numeros);

?>