package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.Venta;
import vista.VistaConsola;

public class ControladorVenta {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;
    private ControladorCliente controladorClientes;
    private ControladorArticulo controladorArticulos;

    public ControladorVenta(Connection conexionBaseDatos, VistaConsola vistaConsola, ControladorCliente controladorClientes, ControladorArticulo controladorArticulos) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
        this.controladorClientes = controladorClientes;
        this.controladorArticulos = controladorArticulos;
    }

    public void gestionarVentas() throws SQLException {
        while (true) {
            int opcion = vistaConsola.mostrarMenuEntidad("Ventas");
            if (opcion == 1) {
                vistaConsola.mostrarVentas(obtenerVentas(), controladorClientes.obtenerClientes(), controladorArticulos.obtenerArticulos());
            } else if (opcion == 2) {
                añadirVenta(vistaConsola.obtenerDatosVenta());
            } else if (opcion == 3) {
                int identificador = vistaConsola.obtenerIdEntidad("venta a modificar");
                if (identificador != -1) {
                    Venta venta = vistaConsola.obtenerDatosVenta();
                    venta.setIdVenta(identificador);
                    modificarVenta(venta);
                }
            } else if (opcion == 4) {
                int identificador = vistaConsola.obtenerIdEntidad("venta a eliminar");
                if (identificador != -1) {
                    eliminarVenta(identificador);
                }
            } else if (opcion == 5) {
                break;
            } else if (opcion != -1) {
                vistaConsola.mostrarMensaje("Opción no válida.");
            }
        }
    }

    private List<Venta> obtenerVentas() throws SQLException {
        List<Venta> listaVentas = new ArrayList<>();
        String consultaSql = "SELECT * FROM Ventas";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            while (resultadoConsulta.next()) {
                listaVentas.add(new Venta(
                        resultadoConsulta.getInt("id_venta"),
                        resultadoConsulta.getInt("id_cliente"),
                        resultadoConsulta.getInt("id_articulo"),
                        resultadoConsulta.getInt("cantidad"),
                        resultadoConsulta.getDate("fecha_venta")
                ));
            }
        }
        return listaVentas;
    }

    private void añadirVenta(Venta venta) throws SQLException {
        String consultaSql = "INSERT INTO Ventas (id_cliente, id_articulo, cantidad, fecha_venta) VALUES (?, ?, ?, ?)";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, venta.getIdCliente());
            declaracionPreparada.setInt(2, venta.getIdArticulo());
            declaracionPreparada.setInt(3, venta.getCantidad());
            declaracionPreparada.setDate(4, venta.getFechaVenta());
            declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje("Venta añadida correctamente.");
        }
    }

    private void modificarVenta(Venta venta) throws SQLException {
        String consultaSql = "UPDATE Ventas SET id_cliente = ?, id_articulo = ?, cantidad = ?, fecha_venta = ? WHERE id_venta = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, venta.getIdCliente());
            declaracionPreparada.setInt(2, venta.getIdArticulo());
            declaracionPreparada.setInt(3, venta.getCantidad());
            declaracionPreparada.setDate(4, venta.getFechaVenta());
            declaracionPreparada.setInt(5, venta.getIdVenta());
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Venta modificada correctamente." : "No se encontró la venta con ID: " + venta.getIdVenta());
        }
    }

    private void eliminarVenta(int identificador) throws SQLException {
        String consultaSql = "DELETE FROM Ventas WHERE id_venta = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, identificador);
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Venta eliminada correctamente." : "No se encontró la venta con ID: " + identificador);
        }
    }
}