<?php
    class Personaje {
        public $nombre;
        public $nivel;
        public $puntosVida;
        public $puntosAtaque;
        
        public function atacar(Personaje $objetivo) {
            echo "{$this->nombre} ataca a {$objetivo->nombre} causando {$this->puntosAtaque} puntos de daño.\n";
            $objetivo->puntosVida -= $this->puntosAtaque;
            if ($objetivo->puntosVida <= 0) {
                $objetivo->puntosVida = 0;
                echo "{$objetivo->nombre} ha sido derrotado.\n";
            } else {
                echo "{$objetivo->nombre} tiene {$objetivo->puntosVida} puntos de vida restantes.\n";
            }
        }  

        public function curarse() {
            $vidaRecuperada = 20;
            $this->puntosVida += $vidaRecuperada;
            echo "{$this->nombre} se cura y recupera {$vidaRecuperada} puntos de vida. Vida actual: {$this->puntosVida}.\n";
        }

        public function subirNivel() {
            $this->nivel++;
            $this->puntosAtaque += 5;
            $this->puntosVida += 30;
            echo "{$this->nombre} sube al nivel {$this->nivel}. Puntos de ataque: {$this->puntosAtaque}, Puntos de vida: {$this->puntosVida}.\n";
        }

        // Metodo opcional para ver los stats iniciales de cada personaje a ser cada uno con un distinto rol
        public function mostrarEstado() {
            echo "Nombre: {$this->nombre}, Nivel: {$this->nivel}, Puntos de Vida: {$this->puntosVida}, Puntos de Ataque: {$this->puntosAtaque}\n";
        }
    }

// Crear personajes
$guerrero = new Personaje();
$guerrero->nombre = "Guerrero";
$guerrero->nivel = "6";
$guerrero->puntosVida = "160";
$guerrero->puntosAtaque = "10";
$mago = new Personaje();
$mago->nombre = "Mago";
$mago->nivel = "5";
$mago->puntosVida = "80";
$mago->puntosAtaque = "20";

// Mostrar el estado inicial
$guerrero->mostrarEstado();
$mago->mostrarEstado();

echo "\n--- Comienza la batalla ---\n";

// Turno 1
$guerrero->atacar($mago);
$mago->curarse();

// Turno 2
$mago->atacar($guerrero);
$guerrero->subirNivel();

// Turno 3
$guerrero->atacar($mago);
$mago->atacar($guerrero);

// Mostrar el estado final de los personajes
echo "\n--- Estado final ---\n";
$guerrero->mostrarEstado();
$mago->mostrarEstado();

?>