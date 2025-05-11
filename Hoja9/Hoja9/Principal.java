import conectaBD.ConectarBD;
import vista.VistaConsola;
import controlador.ControladorMain;
import java.sql.*;

public class Principal {
    public static void main(String[] args) {
        ConectarBD conectarBD = new ConectarBD();
        Connection conexionBaseDatos = conectarBD.getConexionBaseDatos();

        if (conexionBaseDatos != null) {
            VistaConsola vistaConsola = new VistaConsola();
            ControladorMain controlador = new ControladorMain(conexionBaseDatos, vistaConsola);
            controlador.iniciar();
            conectarBD.cerrarConexion();
            vistaConsola.cerrarScanner();
        } else {
            System.out.println("No se pudo iniciar la aplicación debido a un error de conexión.");
        }
    }
}