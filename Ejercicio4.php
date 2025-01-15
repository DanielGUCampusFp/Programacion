<?php
    class Carrito {
        public $productos = [];
        
        public function agregarProducto($nombre, $precio, $cantidad) {
            // Buscar si el producto ya existe en el carrito
            foreach ($this->productos as $producto) {
                if ($producto['nombre'] === $nombre) {
                    // Si ya existe, se actualiza la cantidad
                    $producto['cantidad'] += $cantidad;
                    echo "Producto '{$nombre}' actualizado en el carrito.\n";
                    return;
            }
            // Si no existe, agregarlo como nuevo producto
            $this->productos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
                ];
            echo "Producto '{$nombre}' agregado al carrito.\n";
            }
        }   

        public function quitarProducto($nombre) {
            foreach ($this->productos as $indice => $producto) {
                if ($producto['nombre'] === $nombre) {
                    unset($this->productos[$indice]);
                    echo "Producto '{$nombre}' eliminado del carrito.\n";
                    return;
                }
            }
            echo "El producto '{$nombre}' no se encontró en el carrito.\n";
        }

        public function calcularTotal() {
            $total = 0;
            foreach ($this->productos as $producto) {
                $total += $producto['precio'] * $producto['cantidad'];
            }
            return $total;
        }

        public function mostrarDetalleCarrito() {
            if (empty($this->productos)) {
                echo "El carrito está vacío.\n";
                return;
            }
    
            echo "Detalles del carrito:\n";
            foreach ($this->productos as $producto) {
                echo "- {$producto['nombre']} (Precio: {$producto['precio']} €, Cantidad: {$producto['cantidad']})\n";
            }
            echo "Total: {$this->calcularTotal()} €\n\n";
        }
    }

    // Crear una instancia del Carrito
    $miCarrito = new Carrito();

    // Agregar productos al carrito
    $miCarrito->agregarProducto("Manzanas", 2, 5);
    $miCarrito->agregarProducto("Pan", 1.5, 2);
    $miCarrito->agregarProducto("Leche", 3, 1);
    
    // Mostrar los detalles del carrito
    $miCarrito->mostrarDetalleCarrito();
    
    // Agregar más del mismo producto
    $miCarrito->agregarProducto("Manzanas", 2, 3);
    
    // Quitar un producto
    $miCarrito->quitarProducto("Pan");
    
    // Mostrar los detalles finales del carrito
    $miCarrito->mostrarDetalleCarrito();

?>