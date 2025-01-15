<?php
class Empleado {
    public $nombre;
    public $sueldo;
    public $añosExperiencia;

    public function calcularBonus() {
        if ($this->añosExperiencia % 2 == 0) {
            $bonus = $this->sueldo + ($this->sueldo * 0.05) * ($this->añosExperiencia / 2);
            $this->sueldo = $bonus;
            echo "El sueldo de {$this->nombre} gracias al bonus de experiencia es de {$this->sueldo}.\n";
            echo"\n";
        } else {
            $bonus = $this->sueldo + ($this->sueldo * 0.05) * (($this->añosExperiencia - 1) / 2);
            $this->sueldo = $bonus;
            echo "El sueldo de {$this->nombre} gracias al bonus de experiencia es de {$this->sueldo}.\n";
            echo"\n";
        }
    }

    public function mostrarDetalles() {
        echo "Nombre: {$this->nombre} \n";
        echo "Sueldo: {$this->sueldo} €\n";
        echo "Años Experiencia: {$this->añosExperiencia} \n";
    }
}

class Consultor extends Empleado {
    public $horasPorProyecto;

    public function calcularBonus() {
        if ($this->añosExperiencia % 100 == 0) {
            $this->sueldo = $this->sueldo + ($this->sueldo * 0.02) * ($this->horasPorProyecto / 100);
            echo "El sueldo de {$this->nombre} gracias al bonus de trabajar mas de 100 horas por proyecto es de {$this->sueldo} €.\n";
            echo"\n";
        } else {
            $this->sueldo = $this->sueldo + ($this->sueldo * 0.02) * (round(($this->añosExperiencia - 50) /100));
            echo "El sueldo de {$this->nombre} gracias al bonus de trabajar mas de 100 horas por proyecto es de {$this->sueldo} €.\n";
            echo"\n";
        }
    }
}

$empleado = new Empleado();
$empleado->nombre = "Daniel González";
$empleado->sueldo = "2000";
$empleado->añosExperiencia = "20";

$consultor = new Consultor();
$consultor->nombre = "Raúl Benítez";
$consultor->sueldo = "3000";
$consultor->añosExperiencia = "5";
$consultor->horasPorProyecto = "110";

$empleado->mostrarDetalles();
$empleado->calcularBonus();

$consultor->mostrarDetalles();
$consultor->calcularBonus();


?>