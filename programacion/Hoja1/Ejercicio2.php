<?php

$numero = readline("Escribe un numero: ");

if ($numero > 0) {
    for ($i = 1; $i <= 10; $i++) {
        $linea = $i * $numero;
        echo $numero . " * " . $i . " = " . $linea . "\n";
    }
} else {
    echo ("El numero tiene que ser positivo");
}

?>