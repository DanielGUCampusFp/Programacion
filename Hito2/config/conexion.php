<?php
class Conexion {
    // Datos de conexión a la base de datos
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = 'curso';
    private $base_datos = 'gestion_tareas'; 
    public $conexion; // Objeto de conexión a la base de datos

    // Constructor: establece la conexión con la base de datos al instanciar la clase
    public function __construct() {
        // Se crea la conexión usando MySQLi
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        // Verifica si hubo un error en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error); // Termina la ejecución si hay un error
        }
    }

    // Método para cerrar la conexión con la base de datos
    public function cerrar() {
        $this->conexion->close();
    }
}
?>
