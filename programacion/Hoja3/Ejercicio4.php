<?php

function tablaMultiplicar($numero){
    try {
        if ($numero <= 0) {
            throw new Exception("El numero debe de ser positivo y distinto de 0");
        }
        for ($i = 1; $i <= 10; $i++) {
            $linea = $i * $numero;
            echo $numero . " * " . $i . " = " . $linea . "\n";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
} 

tablaMultiplicar(5);
tablaMultiplicar(0);
tablaMultiplicar(-2);

?>