<?php

$array = ["Manzana", "Banana", "Naranja", "Pera", "Uva", "Mango", "Piña", "Fresa", "Sandía", "Melón", "Kiwi", "Papaya", "Cereza", "Durazno", "Ciruela", "Granada", "Higo", "Lima", "Limón", "Maracuyá"];

function buscarElemento($array, $valor) {
    $posicion  = array_search($valor, $array);
    if ($posicion !== false) {
        return "La posicion es: " . $posicion;
    }
    throw new Exception("La fruta no se encuentra en la lista");
} 

try {
    echo buscarElemento($array, "Manzana");
    echo "\n";
    echo buscarElemento($array, "Sandía");
    echo "\n";
    echo buscarElemento($array, "Tomate");
} catch (Exception $e) {
    echo $e->getMessage();
}

?>