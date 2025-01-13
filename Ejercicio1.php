<?php
    class Persona {
        public $nombre;
        public $edad;
        public $genero;

        public function presentar(){
            echo "Hola, me llamo {$this->nombre}, tengo {$this->edad} años y soy {$this->genero}.";
        }
    }

    // Crear una instancia de la persona
    $persona = new Persona();
    $persona->nombre = "Daniel";
    $persona->edad = "18";
    $persona->genero = "hombre";

    // Usar los métodos
    $persona->presentar();

?>