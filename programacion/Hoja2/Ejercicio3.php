<?php

echo ("Creacion de Cuenta \n");
$contraseña = readline("Ingresa una contraseña: ");

function validarContrasena($contraseña) {
    // Verificar si la longitud es de al menos 8 caracteres
    if (strlen($contraseña) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres.\n";
        return false;
    }

    // Verificar si contiene al menos una letra mayúscula
    if (!preg_match('/[A-Z]/', $contraseña)) {
        echo "La contraseña debe contener al menos una letra mayúscula.\n";
        return false;
    }

    // Verificar si contiene al menos una letra minúscula
    if (!preg_match('/[a-z]/', $contraseña)) {
        echo "La contraseña debe contener al menos una letra minúscula.\n";
        return false;
    }

    // Verificar si contiene al menos un número
    if (!preg_match('/[0-9]/', $contraseña)) {
        echo "La contraseña debe contener al menos un número.\n";
        return false;
    }

    // Si pasa todo las requerido
    return true;
}

// Llamar a la función y mostrar el resultado
if (validarContrasena($contraseña)) {
    echo "¡Contraseña válida!\n";
} else {
    echo "La contraseña no cumple con los requisitos.\n";
}

?>