<?php

class Empleado {
    // Propiedades privadas
    private string $nombre;
    private float $sueldo;
    private string $puesto;

    // Constructor para inicializar las propiedades
    public function __construct($nombre, $sueldo, $puesto) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->puesto = $puesto;
    }

    // Método para modificar el sueldo
    public function setSueldo($nuevoSueldo) {
        if ($nuevoSueldo > 0) {
            $this->sueldo = $nuevoSueldo;
        } else {
            echo "El sueldo debe ser un valor positivo.\n";
        }
    }

    // Método para obtener el sueldo
    public function getSueldo(){
        return $this->sueldo;
    }

    // Método para obtener el nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Método para obtener el puesto
    public function getPuesto() {
        return $this->puesto;
    }

    // Método para mostrar detalles del empleado
    public function mostrarDetalles() {
        return "\nNombre: {$this->nombre}, Puesto: {$this->puesto}, Sueldo: {$this->sueldo}";
    }
}

class Manager extends Empleado {
    // Propiedad adicional para el departamento
    private string $departamento;

    // Constructor que inicializa las propiedades del padre y el departamento
    public function __construct($nombre, $sueldo, $puesto, $departamento) {
        parent::__construct($nombre, $sueldo, $puesto);
        $this->departamento = $departamento;
    }

    // Método para obtener el departamento
    public function getDepartamento() {
        return $this->departamento;
    }

    // Método para revisar un empleado
    public function revisarEmpleado(Empleado $empleado) {
        echo "Revisando empleado: Nombre: {$empleado->getNombre()}, Puesto: {$empleado->getPuesto()}\n";
    }

    // Método para mostrar detalles del manager
    public function mostrarDetalles() {
        $detallesBase = parent::mostrarDetalles();
        return "{$detallesBase}, Departamento: {$this->departamento}\n";
    }
}

// Creación de empleados
$empleado1 = new Empleado("Ana López", 2500, "Desarrollador");
$empleado2 = new Empleado("Carlos Pérez", 3000, "Diseñador");

// Mostrar detalles iniciales de los empleados
echo $empleado1->mostrarDetalles();
echo $empleado2->mostrarDetalles();

// Modificar el sueldo de un empleado
$empleado1->setSueldo(2800);
echo "\nSueldo actualizado de {$empleado1->getNombre()}: {$empleado1->getSueldo()}";

// Crear un Manager
$manager = new Manager("Laura Sánchez", 5000, "Gerente", "Tecnología");

echo $manager->mostrarDetalles();

$manager->revisarEmpleado($empleado1);
$manager->revisarEmpleado($empleado2);
?>