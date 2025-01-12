<?php
    class Empleado {
        public $nombre;
        public $sueldo;
        
        public function mostrarDetalles() {
            echo "Empleado: {$this->nombre}, Sueldo: {$this->sueldo} \n";
        }
    }

    class Gerente extends Empleado {
        public $departamento;

        public function mostrarDetalles() {
            echo "Gerente: {$this->nombre}, Sueldo: {$this->sueldo}, Departamento: {$this->departamento} \n";
        }
    }

    // Crear una instancia del Empleado
    $empleado = new Empleado();
    $empleado->nombre = "Daniel González";
    $empleado->sueldo = "1000";

    // Usar los métodos
    $empleado->mostrarDetalles();

    // Crear una instancia del Gerente
    $gerente = new Gerente();
    $gerente->nombre = "Ana López";
    $gerente->sueldo = "1000";
    $gerente->departamento = "Ventas";

    //Usar los métodos
    $gerente->mostrarDetalles();
?>