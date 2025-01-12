<?php
    class Libro {
        public $titulo;
        public $autor;
        public $num_paginas;
        
        public function mostrarInfo(){
            echo "El titulo del libro es: " . $this->titulo . "\nSu autor es: " . $this->autor . "\nY tiene un total de " . $this->num_paginas . " páginas.";
        }
    }

    // Crear una instancia de Libro
    $Libro1 = new Libro();
    $Libro1->titulo = "El Quijote";
    $Libro1->autor = "Cervantes";
    $Libro1->num_paginas = "1500";

    // Usar los métodos
    $Libro1->mostrarInfo();

?>