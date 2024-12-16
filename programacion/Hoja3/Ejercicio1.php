<?php

$numero1 = readline("Escribe el primer numero: ");
$numero2 = readline("Escribe el segundo numero: ");
$operador = readline("Introduce la operacion que deseas hacer(+, -, *, /): ");

function calculadora($numero1, $numero2, $operador) {
    try {
        switch ($operador) {
            case '+':
                return $numero1 + $numero2;
            case '-':
                return $numero1 - $numero2;
            case '*':
                return $numero1 * $numero2;
            case '/':
                if ($numero2 == 0) {
                    throw new Exception("Error: No se puede dividir entre cero.");
                }
                return $numero1 / $numero2;
            default:
                throw new Exception("Error: Operador no válido.");
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

$resultado = calculadora($numero1, $numero2, $operador);
echo "Resultado: $resultado\n";

?>