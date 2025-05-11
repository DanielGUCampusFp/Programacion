package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.FacturaRecibida;
import vista.VistaConsola;

public class ControladorFacturaRecibida {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;
    private ControladorProveedor controladorProveedores;

    public ControladorFacturaRecibida(Connection conexionBaseDatos, VistaConsola vistaConsola, ControladorProveedor controladorProveedores) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
        this.controladorProveedores = controladorProveedores;
    }

    public void gestionarFacturasRecibidas() throws SQLException {
        while (true) {
            int opcion = vistaConsola.mostrarMenuEntidad("Facturas Recibidas");
            if (opcion == 1) {
                vistaConsola.mostrarFacturasRecibidas(obtenerFacturasRecibidas(), controladorProveedores.obtenerProveedores());
            } else if (opcion == 2) {
                añadirFacturaRecibida(vistaConsola.obtenerDatosFacturaRecibida());
            } else if (opcion == 3) {
                int identificador = vistaConsola.obtenerIdEntidad("factura a modificar");
                if (identificador != -1) {
                    FacturaRecibida factura = vistaConsola.obtenerDatosFacturaRecibida();
                    factura.setIdFactura(identificador);
                    modificarFacturaRecibida(factura);
                }
            } else if (opcion == 4) {
                int identificador = vistaConsola.obtenerIdEntidad("factura a eliminar");
                if (identificador != -1) {
                    eliminarFacturaRecibida(identificador);
                }
            } else if (opcion == 5) {
                break;
            } else if (opcion != -1) {
                vistaConsola.mostrarMensaje("Opción no válida.");
            }
        }
    }

    private List<FacturaRecibida> obtenerFacturasRecibidas() throws SQLException {
        List<FacturaRecibida> listaFacturas = new ArrayList<>();
        String consultaSql = "SELECT * FROM Facturas_Recibidas";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            while (resultadoConsulta.next()) {
                listaFacturas.add(new FacturaRecibida(
                        resultadoConsulta.getInt("id_factura"),
                        resultadoConsulta.getInt("id_proveedor"),
                        resultadoConsulta.getDate("fecha"),
                        resultadoConsulta.getDouble("total")
                ));
            }
        }
        return listaFacturas;
    }

    private void añadirFacturaRecibida(FacturaRecibida factura) throws SQLException {
        String consultaSql = "INSERT INTO Facturas_Recibidas (id_proveedor, fecha, total) VALUES (?, ?, ?)";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, factura.getIdProveedor());
            declaracionPreparada.setDate(2, factura.getFecha());
            declaracionPreparada.setDouble(3, factura.getTotal());
            declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje("Factura añadida correctamente.");
        }
    }

    private void modificarFacturaRecibida(FacturaRecibida factura) throws SQLException {
        String consultaSql = "UPDATE Facturas_Recibidas SET id_proveedor = ?, fecha = ?, total = ? WHERE id_factura = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, factura.getIdProveedor());
            declaracionPreparada.setDate(2, factura.getFecha());
            declaracionPreparada.setDouble(3, factura.getTotal());
            declaracionPreparada.setInt(4, factura.getIdFactura());
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Factura modificada correctamente." : "No se encontró la factura con ID: " + factura.getIdFactura());
        }
    }

    private void eliminarFacturaRecibida(int identificador) throws SQLException {
        String consultaSql = "DELETE FROM Facturas_Recibidas WHERE id_factura = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, identificador);
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Factura eliminada correctamente." : "No se encontró la factura con ID: " + identificador);
        }
    }
}