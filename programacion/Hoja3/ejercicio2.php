<?php

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? "Válido" : error_log("Error: Email no válido \n", 3, "errores.log");
}

$email = readline("Introduce tu correo: ");
validarEmail($email);

?>