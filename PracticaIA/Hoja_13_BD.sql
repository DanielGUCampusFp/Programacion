DROP DATABASE IF EXISTS blog_recetas;
CREATE DATABASE IF NOT EXISTS blog_recetas;
USE blog_recetas;
	
CREATE TABLE recetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    receta VARCHAR(50),
    descripcion TEXT
);
	