DROP DATABASE IF EXISTS Tienda_Online;
CREATE DATABASE Tienda_Online;
USE Tienda_Online;

CREATE TABLE clientes (
    cliente_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    direccion VARCHAR(255),
    telefono VARCHAR(15)
);

CREATE TABLE productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    precio DECIMAL(10, 2)
);

CREATE TABLE pedidos (
    pedido_id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(cliente_id) REFERENCES clientes(cliente_id)
);

CREATE TABLE pedido_productos (
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    PRIMARY KEY (pedido_id, producto_id),
    FOREIGN KEY(pedido_id) REFERENCES pedidos(pedido_id),
    FOREIGN KEY(producto_id) REFERENCES productos(producto_id)
);

-- Insertar Clientes
INSERT INTO clientes (nombre, email, direccion, telefono) VALUES
('Juan Pérez', 'juan.perez@example.com', 'Calle Falsa 123, Madrid', '612345678'),
('María González', 'maria.gonzalez@example.com', 'Avenida de la Constitución 45, Barcelona', '623456789'),
('Carlos Sánchez', 'carlos.sanchez@example.com', 'Calle del Sol 10, Valencia', '634567890'),
('Ana Martínez', 'ana.martinez@example.com', 'Carrer de la Pau 18, Valencia', '645678901'),
('Luis Rodríguez', 'luis.rodriguez@example.com', 'Calle Mayor 22, Sevilla', '656789012'),
('Elena Fernández', 'elena.fernandez@example.com', 'Calle de la Luna 55, Zaragoza', '667890123'),
('Pedro Álvarez', 'pedro.alvarez@example.com', 'Avenida de la Paz 75, Madrid', '678901234');

-- Insertar Productos
INSERT INTO productos (nombre, precio) VALUES
('Camiseta Roja', 15.99),
('Pantalón Azul', 29.99),
('Zapatillas Deportivas', 49.99),
('Gorra Deportiva', 12.99),
('Chaqueta de Cuero', 89.99),
('Auriculares Bluetooth', 69.99),
('Reloj de Pulsera', 120.00),
('Mochila de Viaje', 35.00);

-- Insertar Pedidos
INSERT INTO pedidos (cliente_id, fecha) VALUES
(1, '2024-11-20 10:30:00'),
(2, '2024-11-21 12:45:00'),
(3, '2024-11-22 15:00:00'),
(4, '2024-11-23 16:20:00'),
(5, '2024-11-24 09:10:00');

-- Insertar Productos en Pedidos
INSERT INTO pedido_productos (pedido_id, producto_id, cantidad) VALUES
(1, 1, 2),  -- Juan Pérez compra 2 camisetas rojas
(1, 4, 1),  -- Juan Pérez compra 1 gorra deportiva
(2, 2, 1),  -- María González compra 1 pantalón azul
(2, 6, 1),  -- María González compra 1 auricular Bluetooth
(3, 3, 1),  -- Carlos Sánchez compra 1 par de zapatillas deportivas
(3, 7, 1),  -- Carlos Sánchez compra 1 reloj de pulsera
(4, 5, 1),  -- Ana Martínez compra 1 chaqueta de cuero
(4, 8, 1),  -- Ana Martínez compra 1 mochila de viaje
(5, 2, 1),  -- Luis Rodríguez compra 1 pantalón azul
(5, 1, 2);  -- Luis Rodríguez compra 2 camisetas rojas
