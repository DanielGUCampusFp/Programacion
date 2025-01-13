<?php
    class Rectangulo {
        public $base;
        public $altura;

        public function calcularArea(){
            $resultado = $this->base * $this->altura;
            echo "El área del rectángulo es: " . $resultado;
        }
    }

    // Crear una instancia del Rectangulo
    $rectangulo = new Rectangulo();
    $rectangulo->base = "10";
    $rectangulo->altura = "5";

    // Usar los métodos
    $rectangulo->calcularArea();

?>