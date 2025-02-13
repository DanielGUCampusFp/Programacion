<?php
session_start(); // Inicia la sesión o reanuda la sesión existente

session_unset(); // Elimina todas las variables de sesión. Es decir, limpia los datos guardados en $_SESSION

session_destroy(); // Destruye toda la sesión actual, eliminando la sesión en el servidor

header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión (login.php)

exit(); // Termina la ejecución del script, asegurando que no se ejecute código adicional después de la redirección
?>
