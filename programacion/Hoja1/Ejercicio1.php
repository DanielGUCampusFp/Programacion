<?php

$numero1 = readline("Escribe el primer numero: ");
$numero2 = readline("Escribe el segundo numero: ");
$operacion = readline("Introduce la operacion que deseas hacer(+, -, *, /): ");

switch ($operacion) {
    case "+":
        $total = $numero1 + $numero2;
        echo "La suma de los dos es: " . $numero1 + $numero2 . "\n";
        break;
    case "-":
        $total = $numero1 - $numero2;
        echo "La resta de los dos es: " . $numero1 - $numero2 . "\n";
        break;
    case "*":
        $total = $numero1 * $numero2;
        echo "La multiplicacion de los dos es: " . $numero1 * $numero2 . "\n";
        break;
    case "/":
        if ($numero2 = 0) {
            echo "No se puede dividir entre 0, operacion no valida";
        } else {
            $total = $numero1 / $numero2;
        echo "La division de los dos es: " . $numero1 / $numero2 . "\n";
        break;
        }
    default:
        echo "Operador no valido";
}

?>