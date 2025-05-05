// Importacion de los paquetes para el uso de metodos de los paquetes de sql y scanner
import java.sql.*;
import java.util.Scanner;

public class Principal {
	// Variable Estatica del Scanner para todo el archivo.java
    private static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
    	// Variables y Datos de la base de datos correspondiente
        String url = "jdbc:mysql://localhost:3306/cine_DanielGonzalez";
        String usuario = "root";
        String contraseña = "curso";

        // Si la conexion es valida se ejecutara lo demas del archivo, si no es correcta dara un error
        try {
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);

            while (true) {
                System.out.println("\n=== Menu de Gestión de Películas ===");
                System.out.println("1. Ver Películas");
                System.out.println("2. Salir");
                System.out.print("Seleccione una opción: ");
                int opcion;
                try {
                    opcion = Integer.parseInt(scanner.nextLine());
                } catch (NumberFormatException e) {
                    System.out.println("Error: Por favor, ingrese un número válido.");
                    continue;
                }
                if (opcion == 1) {
                    mostrarPeliculas(conexion);
                } else if (opcion == 2) {
                    System.out.println("Saliendo del Programa de Gestión de Películas");
                    break;
                } else {
                    System.out.println("Opción no válida. Inténtelo de nuevo.");
                }
            }
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
        } finally {
            scanner.close();
        }
    }

    // Metodo con el Select para mostrar las peliculas disponibles
    private static void mostrarPeliculas(Connection conexion) {
        try (Statement stmt = conexion.createStatement();
        	// Select para luego mostrar los datos en el while
            ResultSet rs = stmt.executeQuery("SELECT p.idPelicula, p.nombre, GROUP_CONCAT(g.genero ORDER BY g.genero SEPARATOR ', ') AS genero, p.año, p.director, p.reparto FROM  peliculas p LEFT JOIN  genero g ON p.idPelicula = g.idPelicula GROUP BY  p.idPelicula, p.nombre, p.año, p.director, p.reparto ORDER BY  p.idPelicula")) {
            // Bucle que recorre las variables de la base de datos
        	while (rs.next()) {
                System.out.println("\nID: " + rs.getInt("idPelicula") + "\n- Nombre: " + rs.getString("nombre") + "\n- Género: " + rs.getString("genero") + "\n- Año: " + rs.getInt("año") + "\n- Director: " + rs.getString("director") + "\n- Reparto: " + rs.getString("reparto"));
            }
        } catch (SQLException e) {
            System.out.println("Error al mostrar las películas: " + e.getMessage());
        }
    }
}