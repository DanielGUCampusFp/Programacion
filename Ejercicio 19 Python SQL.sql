DROP DATABASE IF EXISTS Gimnasio;
CREATE DATABASE Gimnasio;
USE Gimnasio;

CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    edad INT,
    tipo_membresia VARCHAR(20)
);

CREATE TABLE entrenadores (
    id_entrenador INT PRIMARY KEY AUTO_INCREMENT,
    nombre_entrenador VARCHAR(50),
    especialidad VARCHAR(50)
);

CREATE TABLE actividades (
    id_actividad INT PRIMARY KEY AUTO_INCREMENT,
    nombre_actividad VARCHAR(50),
    horario VARCHAR(50),
    duracion INT,
    id_entrenador INT,
    FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id_entrenador)
);

CREATE TABLE inscripciones (
    id_inscripcion INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    id_actividad INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_actividad) REFERENCES actividades(id_actividad)
);

