DROP DATABASE IF EXISTS StreamWeb;
CREATE DATABASE StreamWeb;
USE StreamWeb;

CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    tipo_plan_base ENUM('Basico', 'Estandar', 'Premium') NOT NULL,
    duracion_suscripcion ENUM('Mensual', 'Anual') NOT NULL
);

CREATE TABLE Paquetes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    paquetes ENUM('Deporte', 'Cine', 'Infantil'),
    precio DECIMAL(5,2),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE
);
