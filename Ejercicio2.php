<?php
    class Circulo {
        public $radio;
        
        public function calcularArea(){
            $area = 3.14 * ($this->radio * $this->radio);
            echo "El Area del circulo de radio " . $this->radio . " es " . $area;
        }
    }

    // Crear una instancia del Circulo
    $circulo1 = new Circulo();
    $circulo1->radio = "5";

    // Usar los métodos
    $circulo1->calcularArea();

?>