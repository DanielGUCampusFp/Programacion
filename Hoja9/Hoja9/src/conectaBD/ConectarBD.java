package conectaBD;

import java.sql.*;

public class ConectarBD {
    private static final String URL = "jdbc:mysql://localhost:3306/JAVAPOO";
    private static final String USUARIO = "root";
    private static final String CONTRASEÑA = "curso";
    private Connection conexion;

    public ConectarBD() {
        try {
            conexion = DriverManager.getConnection(URL, USUARIO, CONTRASEÑA);
            System.out.println("Conexión a la base de datos establecida correctamente.");
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
            conexion = null;
        }
    }

    public Connection getConexion() {
        return conexion;
    }

    public void cerrarConexion() {
        if (conexion != null) {
            try {
                conexion.close();
                System.out.println("Conexión a la base de datos cerrada.");
            } catch (SQLException e) {
                System.out.println("Error al cerrar la conexión: " + e.getMessage());
            }
        }
    }
}