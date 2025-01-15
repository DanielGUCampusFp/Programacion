<?php
class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    // Método para marcar la tarea como completada
    public function marcarComoCompletada() {
        $this->estado = "Completada";
        echo "La tarea '{$this->nombre}' ha sido marcada como completada.\n";
    }

    // Método para editar la descripción de la tarea
    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
        echo "La descripción de la tarea '{$this->nombre}' ha sido actualizada.\n";
    }

    // Método para mostrar la información de la tarea
    public function mostrarTarea() {
        echo "Nombre: {$this->nombre}\n";
        echo "Descripción: {$this->descripcion}\n";
        echo "Fecha Límite: {$this->fechaLimite}\n";
        echo "Estado: {$this->estado}\n\n";
    }
}

// Crear una lista de tareas en un array
$tareas = [];

// Crear y agregar tareas al array
$tarea1 = new Tarea();
$tarea1->nombre = "Hacer la Compra";
$tarea1->descripcion = "Hay que comprar el pan y refrigerados.";
$tarea1->fechaLimite = "14/01/2025";
$tarea1->estado = "No Completada";
$tareas[] = $tarea1;

$tarea2 = new Tarea();
$tarea2->nombre = "Tender la Ropa";
$tarea2->descripcion = "Hay que tender la ropa.";
$tarea2->fechaLimite = "16/01/2025";
$tarea2->estado = "No Completada";
$tareas[] = $tarea2;

// Mostrar todas las tareas
echo "Lista de tareas inicial:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

// Realizar operaciones con las tareas
$tareas[0]->editarDescripcion("Hay que comprar el pan, refrigerados y además huevos.");
$tareas[0]->marcarComoCompletada();

$tareas[1]->editarDescripcion("Hay que tender la ropa y luego doblarla.");
$tareas[1]->marcarComoCompletada();

// Mostrar todas las tareas después de las actualizaciones
echo "\nLista de tareas actualizada:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}
?>