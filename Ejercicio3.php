<?php
    class Animal {
        public $especie;

        public function emitirSonido() {
            if ($this->especie == "perro") {
                echo "Guau guau!\n";
            } elseif ($this->especie == "gato") {
                echo "Miau miau!\n";
            } else {
                echo "Este animal no tiene un sonido definido.";
                }
            }
        }

    class Perro extends Animal {
        public $raza;

        public function mostrarInformacion() {
            echo "Especie: {$this->especie}, Raza: {$this->raza}\n";
        }
    }

    // Crear una instancia del Perro
    $perro = new Perro();
    $perro->especie = "perro";
    $perro->raza = "Beagle";

    // Usar los métodos
    $perro->mostrarInformacion();
    $perro->emitirSonido();

?>