<?php

$altura = readline("Introduce la altura que quieras para una piramide: ");

for ($i = 1; $i <= $altura; $i++) {
    // Establecer la altura de la piramide
    for ($j = $altura; $j > $i; $j--) {
        echo " ";
    }
    
    for ($k = 1; $k <= $i; $k++) {
        echo $k;
    }
    
    for ($k = $i - 1; $k >= 1; $k--) {
        echo $k;
    }
    
    echo "\n";
}

?>