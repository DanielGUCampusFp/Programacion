<?php

$numero = readline("Escribe un numero: ");

$esPrimo = true;

for ($i = 2; $i < $numero; $i++) {
    if ($numero % $i == 0) {
        $esPrimo = false;
        break; // Si encontramos un divisor, salimos del bucle
    }
}

if ($esPrimo && $numero > 1) {
    echo "El numero " . $numero . " es primo\n";
} else {
    echo "El numero " . $numero . " no es primo\n";
}

?>
