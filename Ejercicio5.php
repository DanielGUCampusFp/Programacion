<?php
    class ConversorMoneda {
        public $dolares;
        public $euros;
        public $factorDolaresAEuros = 0.98;
        public $factorEurosADolares = 1.02;

        public function convertirDolaresAEuros() {
            $total = $this->dolares * $this->factorDolaresAEuros;
            echo "{$this->dolares} dolares son aproximadamente " . round($total, 2) . " EUR.\n";
        }

        public function convertirEurosADolares() {
            $total = $this->euros * $this->factorEurosADolares;
            echo "{$this->euros} EUR son aproximadamente " . round($total, 2) . " USD.\n";
        }
    }

    // Crear una instancia del Conversor de Monedas
    $miConversion = new ConversorMoneda();
    $miConversion->dolares = "100";
    $miConversion->euros = "85";

    // Usar los métodos
    $miConversion->convertirDolaresAEuros();
    $miConversion->convertirEurosADolares();

?>