<?php
    class Vehiculo {
        public $marca;
        
        public function encender(){
            echo "El coche " . $this->marca . " " . $this->modelo . " se ha encendido";
        }
    }

    class Coche extends Vehiculo {
        public $modelo;
    }

    // Crear una instancia del coche
    $vehiculo1 = new Coche();
    $vehiculo1->marca = "SEAT";
    $vehiculo1->modelo = "Córdoba";

    // Usar los métodos
    $vehiculo1->encender();

?>