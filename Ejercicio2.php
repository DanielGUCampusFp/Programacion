<?php
    class CuentaBancaria {
        private $titular;
        private $saldo;
        private $tipoCuenta;

        public function __construct($titular, $tipoCuenta) {
            $this->titular = $titular;
            $this->saldo = "0";
            $this->tipoCuenta = $tipoCuenta;
        }
        
        public function depositar($cantidad) {
            if ($cantidad > 0) {
                $this->saldo += $cantidad;
                echo "Depósito de {$cantidad} realizado exitosamente. Saldo actual: {$this->saldo}\n";
            } else {
                echo "La cantidad a depositar debe ser positiva.";
            }
        }

        public function retirar($cantidad) {
            if ($cantidad < $this->saldo) {
                if ($cantidad > 0) {
                    if ($this->verificarSaldoSuficiente($cantidad)) {
                        $this->saldo -= $cantidad;
                        echo "Retiro de {$cantidad} realizado exitosamente. Saldo actual: {$this->saldo}\n";
                    } else {
                        echo "Saldo insuficiente para retirar {$cantidad}. Saldo actual: {$this->saldo}\n";
                    }
                } else {
                    echo "La cantidad a retirar debe ser positiva.\n";
                }
            }
        }

        public function obtenerSaldo() {
            return $this->saldo;
        }

        private function verificarSaldoSuficiente($cantidad) {
            return $this->saldo >= $cantidad;
            }
    
        public function mostrarDetalles() {
            return "Titular: {$this->titular}, Tipo de Cuenta: {$this->tipoCuenta}, Saldo: {$this->saldo}\n";
        }
    }

// Crear Cuenta
$miCuenta = new CuentaBancaria("Daniel González", "3000", "Ahorros");
echo $miCuenta->mostrarDetalles();

$miCuenta->depositar(500);
$miCuenta->depositar(300);

$miCuenta->retirar(1000);

$miCuenta->retirar(200);

echo "Saldo final: {$miCuenta->obtenerSaldo()}";
?>