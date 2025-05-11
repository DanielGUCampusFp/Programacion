package controlador;

import java.sql.*;
import vista.VistaConsola;

public class ControladorMain {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;
    private ControladorCliente controladorClientes;
    private ControladorProveedor controladorProveedores;
    private ControladorArticulo controladorArticulos;
    private ControladorFacturaRecibida controladorFacturasRecibidas;
    private ControladorVenta controladorVentas;

    public ControladorMain(Connection conexionBaseDatos, VistaConsola vistaConsola) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
        this.controladorClientes = new ControladorCliente(conexionBaseDatos, vistaConsola);
        this.controladorProveedores = new ControladorProveedor(conexionBaseDatos, vistaConsola);
        this.controladorArticulos = new ControladorArticulo(conexionBaseDatos, vistaConsola);
        this.controladorFacturasRecibidas = new ControladorFacturaRecibida(conexionBaseDatos, vistaConsola, controladorProveedores);
        this.controladorVentas = new ControladorVenta(conexionBaseDatos, vistaConsola, controladorClientes, controladorArticulos);
    }

    public void iniciar() {
        while (true) {
            int opcion = vistaConsola.mostrarMenuPrincipal();
            try {
                if (opcion == 1) {
                    controladorClientes.gestionarClientes();
                } else if (opcion == 2) {
                    controladorProveedores.gestionarProveedores();
                } else if (opcion == 3) {
                    controladorArticulos.gestionarArticulos();
                } else if (opcion == 4) {
                    controladorFacturasRecibidas.gestionarFacturasRecibidas();
                } else if (opcion == 5) {
                    controladorVentas.gestionarVentas();
                } else if (opcion == 6) {
                    generarInformeVentas();
                } else if (opcion == 7) {
                    vistaConsola.mostrarMensaje("Saliendo del programa...");
                    break;
                } else if (opcion != -1) {
                    vistaConsola.mostrarMensaje("Opción no válida. Inténtelo de nuevo.");
                }
            } catch (SQLException e) {
                vistaConsola.mostrarMensaje("Error: " + e.getMessage());
            }
        }
    }

    private void generarInformeVentas() throws SQLException {
        String consultaSql = "SELECT c.nombre, a.nombre AS articulo, v.cantidad, v.fecha_venta, (v.cantidad * a.precio_unitario) AS total " +
                     "FROM Ventas v " +
                     "JOIN Clientes c ON v.id_cliente = c.id_cliente " +
                     "JOIN Articulos a ON v.id_articulo = a.id_articulo " +
                     "ORDER BY c.nombre, v.fecha_venta";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            vistaConsola.mostrarInformeVentas(resultadoConsulta);
        }
    }
}