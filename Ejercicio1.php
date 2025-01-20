<?php
    class Producto {
        private $nombre;
        private $precio;
        private $cantidad;

        public function __construct($nombre, $precio, $cantidad) {
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }
        
        public function getNombre() {
            return $this->nombre;
        } 

        public function getPrecio() {
            return $this->precio;
        }

        public function getCantidad() {
            return $this->cantidad;
        }
        public function mostrarDetalles() {
            echo "\nNombre: {$this->getNombre()}, Precio: {$this->getPrecio()}, Cantidad: {$this->getCantidad()}";
        }
    }
    class ProductoImportado extends Producto {
        private $impuestoAdicional;

        public function __construct($nombre, $precio, $cantidad, $impuestoAdicional) {
            parent::__construct($nombre, $precio, $cantidad);
            $this->impuestoAdicional = $impuestoAdicional;
        }

        public function calcularPrecioFinal() {
            return $this->getPrecio() + $this->impuestoAdicional;
        }

        public function mostrarDetalles() {
            parent::mostrarDetalles();
            echo ", Impuesto Adicional: {$this->calcularPrecioFinal()} \n";
        }
    }

// Crear Producto
$producto = new Producto("Portátil", "1200", "5");
$producto->mostrarDetalles();

// Crear Producto
$productoImportado = new ProductoImportado("Carne de Kobe", "200", "3", "50");
echo $productoImportado->mostrarDetalles();
?>