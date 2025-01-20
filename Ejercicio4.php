<?php
class Vehiculo {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function encender() {
        echo "El coche está encendido.\n";
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }
}

class Coche extends Vehiculo {
    private $combustible;

    public function __construct($marca, $modelo, $combustible) {
        parent::__construct($marca, $modelo);
        $this->combustible = $combustible;
    }

    public function mostrarDetalles() {
        echo "Marca: " . $this->getMarca() . ", Modelo: " . $this->getModelo() . ", Combustible: " . $this->combustible . "\n";
    }
}

// Crear Vehiculo
$miVehiculo = new Vehiculo("SEAT", "Córdoba");
$miVehiculo->encender();

// Crear Coche
$miCoche = new Coche("Citröen", "Cactus", "Diésel");
$miCoche->encender();
$miCoche->mostrarDetalles();
?>
