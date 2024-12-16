<?php

function convertirTemperatura($unidad, $conversion){
    try {
        switch ($conversion){
            case "C":
                $conversionFinal = ($unidad - 32) * 5/9;
                return $conversionFinal;
            case "F":
                $conversionFinal = ($unidad * 9/5) + 32;
                return $conversionFinal;
            default:
                throw new Exception("Unidad de conversión no válida. Usa 'C' para Celsius o 'F' para Fahrenheit.");
        }
    } catch (Exception $e) {
        error_log(" - Error: " . $e->getMessage() . "\n", 3, "errores.log");
        return "Se ha producido un error. Consulta el archivo errores.log.";
    }
}

echo convertirTemperatura(100, "C") . "\n";
echo convertirTemperatura(0, "F") . "\n";
echo convertirTemperatura(25, "X") . "\n"; 

?>