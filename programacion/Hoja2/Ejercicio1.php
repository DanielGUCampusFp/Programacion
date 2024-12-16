<?php

echo "Contador de palabras\n";
$frase = readline("Introduce una frase: ");
$contador = 0;
$longitud = strlen($frase);

for ($i = 0; $i < $longitud; $i++) {
    // Si es un espacio y el siguiente carácter no es un espacio o el final de la cadena
    if ($frase[$i] == ' ' && $i + 1 < $longitud && $frase[$i + 1] != ' ') {
        $contador++;
    }
}

// Si la frase no está vacía, sumar 1 al contador para contar la última palabra
if ($longitud > 0 && $frase != '') {
    $contador++;
}

echo "Número total de palabras: $contador\n";

?>