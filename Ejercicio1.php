<?php
    class CuentaBancaria {
        public $titular;
        public $saldo;
        public $tipoDeCuenta;

        public function depositar($cantidad) {
            if ($cantidad > 0) {
                $this->saldo += $cantidad;
                echo "Se han depositado {$cantidad} €. Saldo actual: {$this->saldo} €.\n";
            } else {
                echo "La cantidad a depositar debe ser positiva.\n";
            }
        }

        public function retirar($cantidad) {
            if ($cantidad > 0 && $cantidad <= $this->saldo) {
                $this->saldo -= $cantidad;
                echo "Se han retirado {$cantidad} €. Saldo actual: {$this->saldo} €.\n";
            } elseif ($cantidad > $this->saldo) {
                echo "Fondos insuficientes. Saldo actual: {$this->saldo} €.\n";
            } else {
                echo "La cantidad a retirar debe ser positiva.\n";
            }
        }

        public function mostrarInfo() {
            echo "Titular: {$this->titular}\n";
            echo "Tipo de cuenta: {$this->tipoDeCuenta}\n";
            echo "Saldo actual: {$this->saldo} €\n";
        }
    }

    // Crear una instancia de la Cuenta
    $miCuenta = new CuentaBancaria();
    $miCuenta->titular = "Daniel";
    $miCuenta->tipoDeCuenta = "Ahorros";
    $miCuenta->saldo = "1500";

    // Usar los métodos
    $miCuenta->mostrarInfo();
    $miCuenta->depositar(500);
    $miCuenta->retirar(300);
    $miCuenta->retirar(1500);
?>