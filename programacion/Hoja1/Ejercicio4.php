<?php

$numeroSecreto = rand(1, 10);
$numero = readline("Introduce un numero para intentar adivinar el numero secreto: ");

while ($numero != $numeroSecreto) {
    if ($numero > $numeroSecreto) {
        $numero = readline("El numero introducido es mayor que el numero secreto, introduce otro: ");
    } elseif ($numero < $numeroSecreto) {
        $numero = readline("El numero introducido es menor que el numero secreto, introduce otro: ");
    }
}
echo ("Enhorabuena acertaste el numero secreto");

?>