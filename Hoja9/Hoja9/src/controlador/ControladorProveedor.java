package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.Proveedor;
import vista.VistaConsola;

public class ControladorProveedor {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;

    public ControladorProveedor(Connection conexionBaseDatos, VistaConsola vistaConsola) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
    }

    public void gestionarProveedores() throws SQLException {
        while (true) {
            int opcion = vistaConsola.mostrarMenuEntidad("Proveedores");
            if (opcion == 1) {
                vistaConsola.mostrarProveedores(obtenerProveedores());
            } else if (opcion == 2) {
                añadirProveedor(vistaConsola.obtenerDatosProveedor());
            } else if (opcion == 3) {
                int identificador = vistaConsola.obtenerIdEntidad("proveedor a modificar");
                if (identificador != -1) {
                    Proveedor proveedor = vistaConsola.obtenerDatosProveedor();
                    proveedor.setIdProveedor(identificador);
                    modificarProveedor(proveedor);
                }
            } else if (opcion == 4) {
                int identificador = vistaConsola.obtenerIdEntidad("proveedor a eliminar");
                if (identificador != -1) {
                    eliminarProveedor(identificador);
                }
            } else if (opcion == 5) {
                break;
            } else if (opcion != -1) {
                vistaConsola.mostrarMensaje("Opción no válida.");
            }
        }
    }

    public List<Proveedor> obtenerProveedores() throws SQLException {
        List<Proveedor> listaProveedores = new ArrayList<>();
        String consultaSql = "SELECT * FROM Proveedores";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            while (resultadoConsulta.next()) {
                listaProveedores.add(new Proveedor(
                        resultadoConsulta.getInt("id_proveedor"),
                        resultadoConsulta.getString("nombre"),
                        resultadoConsulta.getString("cif"),
                        resultadoConsulta.getString("telefono")
                ));
            }
        }
        return listaProveedores;
    }

    private void añadirProveedor(Proveedor proveedor) throws SQLException {
        String consultaSql = "INSERT INTO Proveedores (nombre, cif, telefono) VALUES (?, ?, ?)";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, proveedor.getNombre());
            declaracionPreparada.setString(2, proveedor.getCif());
            declaracionPreparada.setString(3, proveedor.getTelefono());
            declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje("Proveedor añadido correctamente.");
        }
    }

    private void modificarProveedor(Proveedor proveedor) throws SQLException {
        String consultaSql = "UPDATE Proveedores SET nombre = ?, cif = ?, telefono = ? WHERE id_proveedor = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, proveedor.getNombre());
            declaracionPreparada.setString(2, proveedor.getCif());
            declaracionPreparada.setString(3, proveedor.getTelefono());
            declaracionPreparada.setInt(4, proveedor.getIdProveedor());
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Proveedor modificado correctamente." : "No se encontró el proveedor con ID: " + proveedor.getIdProveedor());
        }
    }

    private void eliminarProveedor(int identificador) throws SQLException {
        String consultaSql = "DELETE FROM Proveedores WHERE id_proveedor = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, identificador);
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Proveedor eliminado correctamente." : "No se encontró el proveedor con ID: " + identificador);
        }
    }
}