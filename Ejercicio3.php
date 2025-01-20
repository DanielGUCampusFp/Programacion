<?php
    class Usuario {
        protected $nombre;
        protected $email;

        public function __construct($nombre, $email) {
            $this->nombre = $nombre;
            $this->email = $email;
        }
        
        public function mostrarInfo() {
            echo "\nNombre: {$this->nombre}, Email: {$this->email}";
        } 
    }

    class Administrador extends Usuario {
        public $nivelAcceso;

        public function __construct($nombre, $email, $nivelAcceso) {
            parent::__construct($nombre, $email);
            $this->nivelAcceso = $nivelAcceso;
        }

        public function mostrarInfo() {
            parent::mostrarInfo();
            echo ", Nivel de Acesso: {$this->nivelAcceso} \n";
        }
    }

// Crear Usuario
$Usuario = new Usuario("Daniel González", "danielgonzalez@gmail.com");
$Usuario->mostrarInfo();

// Crear Administrador
$productoImportado = new Administrador("Raúl Benítez", "raulbenitez@gmail.com", "4");
echo $productoImportado->mostrarInfo();
?>