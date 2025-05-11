package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.Articulo;
import vista.VistaConsola;

public class ControladorArticulo {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;

    public ControladorArticulo(Connection conexionBaseDatos, VistaConsola vistaConsola) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
    }

    public void gestionarArticulos() throws SQLException {
        while (true) {
            int opcion = vistaConsola.mostrarMenuEntidad("Artículos");
            if (opcion == 1) {
                vistaConsola.mostrarArticulos(obtenerArticulos());
            } else if (opcion == 2) {
                añadirArticulo(vistaConsola.obtenerDatosArticulo());
            } else if (opcion == 3) {
                int identificador = vistaConsola.obtenerIdEntidad("artículo a modificar");
                if (identificador != -1) {
                    Articulo articulo = vistaConsola.obtenerDatosArticulo();
                    articulo.setIdArticulo(identificador);
                    modificarArticulo(articulo);
                }
            } else if (opcion == 4) {
                int identificador = vistaConsola.obtenerIdEntidad("artículo a eliminar");
                if (identificador != -1) {
                    eliminarArticulo(identificador);
                }
            } else if (opcion == 5) {
                break;
            } else if (opcion != -1) {
                vistaConsola.mostrarMensaje("Opción no válida.");
            }
        }
    }

    public List<Articulo> obtenerArticulos() throws SQLException {
        List<Articulo> listaArticulos = new ArrayList<>();
        String consultaSql = "SELECT * FROM Articulos";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            while (resultadoConsulta.next()) {
                listaArticulos.add(new Articulo(
                        resultadoConsulta.getInt("id_articulo"),
                        resultadoConsulta.getString("nombre"),
                        resultadoConsulta.getDouble("precio_unitario"),
                        resultadoConsulta.getInt("stock")
                ));
            }
        }
        return listaArticulos;
    }

    private void añadirArticulo(Articulo articulo) throws SQLException {
        String consultaSql = "INSERT INTO Articulos (nombre, precio_unitario, stock) VALUES (?, ?, ?)";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, articulo.getNombre());
            declaracionPreparada.setDouble(2, articulo.getPrecioUnitario());
            declaracionPreparada.setInt(3, articulo.getStock());
            declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje("Artículo añadido correctamente.");
        }
    }

    private void modificarArticulo(Articulo articulo) throws SQLException {
        String consultaSql = "UPDATE Articulos SET nombre = ?, precio_unitario = ?, stock = ? WHERE id_articulo = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, articulo.getNombre());
            declaracionPreparada.setDouble(2, articulo.getPrecioUnitario());
            declaracionPreparada.setInt(3, articulo.getStock());
            declaracionPreparada.setInt(4, articulo.getIdArticulo());
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Artículo modificado correctamente." : "No se encontró el artículo con ID: " + articulo.getIdArticulo());
        }
    }

    private void eliminarArticulo(int identificador) throws SQLException {
        String consultaSql = "DELETE FROM Articulos WHERE id_articulo = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, identificador);
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Artículo eliminado correctamente." : "No se encontró el artículo con ID: " + identificador);
        }
    }
}