DROP DATABASE IF EXISTS cine_DanielGonzalez;
CREATE DATABASE cine_DanielGonzalez;
USE cine_DanielGonzalez;
 
CREATE TABLE peliculas (
    idPelicula INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
	año INT NOT NULL,
    director VARCHAR(50) NOT NULL,
    reparto VARCHAR(100) NOT NULL
);

CREATE TABLE genero (
    idGenero INT PRIMARY KEY AUTO_INCREMENT,
    idPelicula INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    FOREIGN KEY (idPelicula) REFERENCES peliculas(idPelicula) ON DELETE CASCADE
);

INSERT INTO peliculas (idPelicula, nombre, año, director, reparto) 
VALUES (1, 'El Padrino', 1972, 'Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan');
INSERT INTO peliculas (idPelicula, nombre, año, director, reparto) 
VALUES (2, 'Inception', 2010, 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page');
INSERT INTO peliculas (idPelicula, nombre, año, director, reparto) 
VALUES (3, 'La La Land', 2016, 'Damien Chazelle', 'Ryan Gosling, Emma Stone, John Legend');
INSERT INTO peliculas (idPelicula, nombre, año, director, reparto) 
VALUES (4, 'Pulp Fiction', 1994, 'Quentin Tarantino', 'John Travolta, Samuel L. Jackson, Uma Thurman');

INSERT INTO genero (idPelicula, genero) VALUES
(1, 'Drama, Crimen'),
(2, 'Ciencia Ficción, Acción, Suspense'),
(3, 'Musical, Romance'),
(4, 'Crimen, Drama, Suspense')