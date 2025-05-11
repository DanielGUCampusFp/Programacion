package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.Cliente;
import vista.VistaConsola;

public class ControladorCliente {
    private Connection conexionBaseDatos;
    private VistaConsola vistaConsola;

    public ControladorCliente(Connection conexionBaseDatos, VistaConsola vistaConsola) {
        this.conexionBaseDatos = conexionBaseDatos;
        this.vistaConsola = vistaConsola;
    }

    public void gestionarClientes() throws SQLException {
        while (true) {
            int opcion = vistaConsola.mostrarMenuEntidad("Clientes");
            if (opcion == 1) {
                vistaConsola.mostrarClientes(obtenerClientes());
            } else if (opcion == 2) {
                añadirCliente(vistaConsola.obtenerDatosCliente());
            } else if (opcion == 3) {
                int identificador = vistaConsola.obtenerIdEntidad("cliente a modificar");
                if (identificador != -1) {
                    Cliente cliente = vistaConsola.obtenerDatosCliente();
                    cliente.setIdCliente(identificador);
                    modificarCliente(cliente);
                }
            } else if (opcion == 4) {
                int identificador = vistaConsola.obtenerIdEntidad("cliente a eliminar");
                if (identificador != -1) {
                    eliminarCliente(identificador);
                }
            } else if (opcion == 5) {
                break;
            } else if (opcion != -1) {
                vistaConsola.mostrarMensaje("Opción no válida.");
            }
        }
    }

    public List<Cliente> obtenerClientes() throws SQLException {
        List<Cliente> listaClientes = new ArrayList<>();
        String consultaSql = "SELECT * FROM Clientes";
        try (Statement declaracion = conexionBaseDatos.createStatement(); ResultSet resultadoConsulta = declaracion.executeQuery(consultaSql)) {
            while (resultadoConsulta.next()) {
                listaClientes.add(new Cliente(
                        resultadoConsulta.getInt("id_cliente"),
                        resultadoConsulta.getString("nombre"),
                        resultadoConsulta.getString("email"),
                        resultadoConsulta.getString("telefono")
                ));
            }
        }
        return listaClientes;
    }

    private void añadirCliente(Cliente cliente) throws SQLException {
        String consultaSql = "INSERT INTO Clientes (nombre, email, telefono) VALUES (?, ?, ?)";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, cliente.getNombre());
            declaracionPreparada.setString(2, cliente.getEmail());
            declaracionPreparada.setString(3, cliente.getTelefono());
            declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje("Cliente añadido correctamente.");
        }
    }

    private void modificarCliente(Cliente cliente) throws SQLException {
        String consultaSql = "UPDATE Clientes SET nombre = ?, email = ?, telefono = ? WHERE id_cliente = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setString(1, cliente.getNombre());
            declaracionPreparada.setString(2, cliente.getEmail());
            declaracionPreparada.setString(3, cliente.getTelefono());
            declaracionPreparada.setInt(4, cliente.getIdCliente());
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Cliente modificado correctamente." : "No se encontró el cliente con ID: " + cliente.getIdCliente());
        }
    }

    private void eliminarCliente(int identificador) throws SQLException {
        String consultaSql = "DELETE FROM Clientes WHERE id_cliente = ?";
        try (PreparedStatement declaracionPreparada = conexionBaseDatos.prepareStatement(consultaSql)) {
            declaracionPreparada.setInt(1, identificador);
            int filasAfectadas = declaracionPreparada.executeUpdate();
            vistaConsola.mostrarMensaje(filasAfectadas > 0 ? "Cliente eliminado correctamente." : "No se encontró el cliente con ID: " + identificador);
        }
    }
}