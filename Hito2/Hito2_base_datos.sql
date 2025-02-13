DROP DATABASE IF EXISTS gestion_tareas;
CREATE DATABASE IF NOT EXISTS gestion_tareas;
USE gestion_tareas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    descripcion TEXT,
    estado ENUM('Pendiente', 'Completada') DEFAULT 'Pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

SELECT * FROM usuarios;