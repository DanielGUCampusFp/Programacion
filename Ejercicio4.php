<?php
    class Producto {
        public $nombre;
        public $precio;

        public function mostrarDetalles() {
            echo "Producto: {$this->nombre}, Precio: {$this->precio} €\n";
        }
    }

    class Electrodomestico extends Producto {
        public $consumo;

        public function mostrarDetalles() {
            echo "Electrodoméstico: {$this->nombre}, Precio: {$this->precio} €, Consumo: {$this->consumo} kWh\n";
        }
    }

    // Crear una instancia del Producto
    $producto = new Producto();
    $producto->nombre = "Cafetera";
    $producto->precio = "45";

    // Usar los métodos
    $producto->mostrarDetalles();

    // Crear una instancia del Electrodoméstico
    $electrodomestico = new Electrodomestico();
    $electrodomestico->nombre = "Refrigerador";
    $electrodomestico->precio = "300";
    $electrodomestico->consumo = "1.5";
    
    // Usar los métodos
    $electrodomestico->mostrarDetalles();

?>