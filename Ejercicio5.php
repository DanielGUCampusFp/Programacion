<?php
    class Calculadora {
        public $num1;
        public $num2;
        
        public function sumar() {
            $resultado = $this->num1 +  $this->num2;
            echo "La suma de " . $this->num1 . " + " . $this->num2 . " es " . $resultado . "\n";
        }
        public function restar() {
            $resultado = $this->num1 -  $this->num2;
            echo "La resta de " . $this->num1 . " - " . $this->num2 . " es " . $resultado . "\n";
        }
        public function multiplicar() {
            $resultado = $this->num1 *  $this->num2;
            echo "La multiplicación de " . $this->num1 . " * " . $this->num2 . " es " . $resultado . "\n";
        }
        public function dividir() {
            if ($this->num2 == 0) {
                return "No se puede dividir entre 0.";
            }
            $resultado = $this->num1 / $this->num2;
            echo "La división de " . $this->num1 . " / " . $this->num2 . " es " . $resultado . "\n";
        }
    }

    // Crear una instancia de la Calculadora
    $miCalculadora = new Calculadora();
    $miCalculadora->num1 = "2";
    $miCalculadora->num2 = "2";

    // Usar los métodos
    $miCalculadora->sumar();
    $miCalculadora->restar();
    $miCalculadora->dividir();
    $miCalculadora->multiplicar();
?>