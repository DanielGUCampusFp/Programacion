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
                System.out.println("2. Añadir Película");
                System.out.println("3. Eliminar Película");
                System.out.println("4. Modificar Película");
                System.out.println("5. Salir");
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
                    añadirPelicula(conexion);
                } else if (opcion == 3) {
                    eliminarPelicula(conexion);
                } else if (opcion == 4) {
                    modificarPelicula(conexion);
                } else if (opcion == 5) {
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
        try {
        	Statement stmt = conexion.createStatement();
        	// Select para luego mostrar los datos en el while
            ResultSet rs = stmt.executeQuery("SELECT p.idPelicula, p.nombre, GROUP_CONCAT(g.genero ORDER BY g.genero SEPARATOR ', ') AS genero, p.año, p.director, p.reparto FROM  peliculas p LEFT JOIN  genero g ON p.idPelicula = g.idPelicula GROUP BY  p.idPelicula, p.nombre, p.año, p.director, p.reparto ORDER BY  p.idPelicula");
            // Bucle que recorre las variables de la base de datos
        	while (rs.next()) {
                System.out.println("\nID: " + rs.getInt("idPelicula") + "\n- Nombre: " + rs.getString("nombre") + "\n- Género: " + rs.getString("genero") + "\n- Año: " + rs.getInt("año") + "\n- Director: " + rs.getString("director") + "\n- Reparto: " + rs.getString("reparto"));
            }
        } catch (SQLException e) {
            System.out.println("Error al mostrar las películas: " + e.getMessage());
        }
    }
    
    // Metodo con el Insert Into para añadir peliculas
    private static void añadirPelicula(Connection conexion) {
        try {     
        	// Primera consulta sql para insertar primero en la tabla peliculas
        	String sql1 = "INSERT INTO peliculas (idPelicula, nombre, año, director, reparto) VALUES (?, ?, ?, ?, ?)";
        	PreparedStatement pstmt1 = conexion.prepareStatement(sql1); // Utilizo preparedstatement porque es mas efectivo en cuanto al introducir datos por teclado
        	
        	System.out.println("Introduce el ID de la pelicula: ");
        	int idPelicula = scanner.nextInt();
        	scanner.nextLine();
        	
        	System.out.println("Introduce el nombre de la pelicula: ");
        	String nombre = scanner.nextLine();
        	
        	System.out.println("Introduce el año de la pelicula: ");
        	int año = scanner.nextInt();
        	scanner.nextLine();
        	
        	System.out.println("Introduce el director de la pelicula: ");
        	String director = scanner.nextLine();
        	
        	System.out.println("Introduce el reparto de la pelicula: ");
        	String reparto = scanner.nextLine();
        	
            pstmt1.setInt(1, idPelicula);
            pstmt1.setString(2, nombre);
            pstmt1.setInt(3, año);
            pstmt1.setString(4, director);
            pstmt1.setString(5, reparto);

            // Segunda consulta para ahora insertarlo en la tabla genero
            String sql2 = "INSERT INTO genero (idPelicula, genero) VALUES (?, ?)";
        	PreparedStatement pstmt2 = conexion.prepareStatement(sql2);
            
        	System.out.println("Introduce el genero de la pelicula: ");
        	String genero = scanner.nextLine();
        	
        	pstmt2.setInt(1, idPelicula);
        	pstmt2.setString(2, genero);
        	
        	// Ejercutar	
        	pstmt1.executeUpdate();
        	pstmt2.executeUpdate();
        	
        	// Cerrar
        	pstmt1.close();
        	pstmt2.close();
        	System.out.println("Peliculal añadida correctamente");
        } catch (SQLException e) {
            System.out.println("Error al añadir la película: " + e.getMessage());
        }
    }
    
 // Metodo con el Delete para eliminar peliculas
    private static void eliminarPelicula(Connection conexion) {
        try {
        	// Consulta para sacar el nombre de la pelicula la cual se va a borrar
        	String selectSQL = "SELECT nombre FROM peliculas WHERE idPelicula = ?";
            PreparedStatement selectStmt = conexion.prepareStatement(selectSQL);
            
            // Consulta para eliminar la pelicula segun el id que introduzcas
        	String sql = "DELETE FROM peliculas WHERE idPelicula = ?";
        	PreparedStatement pstmt = conexion.prepareStatement(sql);
        	
        	System.out.println("Introduce el ID de la pelicula para borrarla: ");
        	int idPelicula = scanner.nextInt();
        	scanner.nextLine();
        	
        	selectStmt.setInt(1, idPelicula);
            ResultSet rs = selectStmt.executeQuery();
        	
            pstmt.setInt(1, idPelicula);
            pstmt.executeUpdate();
            
            String nombrePelicula;
            if (rs.next()) {
                nombrePelicula = rs.getString("nombre");
            } else {
                System.out.println("No se encontró una película con ID: " + idPelicula);
                return;
            }
            
            System.out.println(nombrePelicula +  " eliminada correctamente.");
        } catch (SQLException e) {
            System.out.println("Error al eliminar la película: " + e.getMessage());
        }
    }
    
    // Metodo con el Update para modificar peliculas
    private static void modificarPelicula(Connection conexion) {
        try {     	
        	// Consulta para actualizar el director y el reparto con el id de la pelicula
        	String sql = "UPDATE peliculas SET director = ?, reparto = ? WHERE idPelicula = ?";
        	PreparedStatement pstmt = conexion.prepareStatement(sql);
        	
        	System.out.println("Introduce el ID de la pelicula a modificar: ");
        	int idPelicula = scanner.nextInt();
        	scanner.nextLine();
        	
        	System.out.println("Introduce el nuevo director para modificarlo: ");
        	String director = scanner.nextLine();
        	
        	System.out.println("Introduce el nuevo reparto para modificarlo: ");
        	String reparto = scanner.nextLine();
        	
            pstmt.setInt(3, idPelicula);
            pstmt.setString(1, director);
            pstmt.setString(2, reparto);
            pstmt.executeUpdate();
            
        	pstmt.close();
        	
        	System.out.println("Pelicula modificadda correctamente");
        } catch (SQLException e) {
            System.out.println("Error al modificar la película: " + e.getMessage());
        }
    }
}