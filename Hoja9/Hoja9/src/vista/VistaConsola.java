package vista;

import java.util.Scanner;
import java.util.List;
import java.sql.ResultSet;
import java.sql.SQLException;
import modelo.*;

public class VistaConsola {
    private Scanner lectorEntrada;

    public VistaConsola() {
        this.lectorEntrada = new Scanner(System.in);
    }

    public int mostrarMenuPrincipal() {
        System.out.println("\n=== Gestión de JAVAPOO S.L. ===");
        System.out.println("1. Gestionar Clientes");
        System.out.println("2. Gestionar Proveedores");
        System.out.println("3. Gestionar Artículos");
        System.out.println("4. Gestionar Facturas Recibidas");
        System.out.println("5. Gestionar Ventas");
        System.out.println("6. Informe de Ventas por Cliente");
        System.out.println("7. Salir");
        System.out.print("Seleccione una opción: ");
        try {
            return Integer.parseInt(lectorEntrada.nextLine());
        } catch (NumberFormatException e) {
            System.out.println("Error: Por favor, ingrese un número válido.");
            return -1;
        }
    }

    public int mostrarMenuEntidad(String entidad) {
        System.out.println("\n=== Gestión de " + entidad + " ===");
        System.out.println("1. Ver " + entidad);
        System.out.println("2. Añadir " + entidad);
        System.out.println("3. Modificar " + entidad);
        System.out.println("4. Eliminar " + entidad);
        System.out.println("5. Volver");
        System.out.print("Seleccione una opción: ");
        try {
            return Integer.parseInt(lectorEntrada.nextLine());
        } catch (NumberFormatException e) {
            System.out.println("Error: Por favor, ingrese un número válido.");
            return -1;
        }
    }

    public void mostrarClientes(List<Cliente> listaClientes) {
        for (Cliente cliente : listaClientes) {
            System.out.println("ID: " + cliente.getIdCliente() +
                    ", Nombre: " + cliente.getNombre() +
                    ", Email: " + cliente.getEmail() +
                    ", Teléfono: " + cliente.getTelefono());
        }
    }

    public Cliente obtenerDatosCliente() {
        System.out.print("Nombre: ");
        String nombre = lectorEntrada.nextLine();
        System.out.print("Email: ");
        String correoElectronico = lectorEntrada.nextLine();
        System.out.print("Teléfono: ");
        String numeroTelefono = lectorEntrada.nextLine();
        return new Cliente(0, nombre, correoElectronico, numeroTelefono);
    }

    public int obtenerIdEntidad(String entidad) {
        System.out.print("ID del " + entidad + ": ");
        try {
            return Integer.parseInt(lectorEntrada.nextLine());
        } catch (NumberFormatException e) {
            System.out.println("Error: Ingrese un número válido.");
            return -1;
        }
    }

    public void mostrarProveedores(List<Proveedor> listaProveedores) {
        for (Proveedor proveedor : listaProveedores) {
            System.out.println("ID: " + proveedor.getIdProveedor() +
                    ", Nombre: " + proveedor.getNombre() +
                    ", CIF: " + proveedor.getCif() +
                    ", Teléfono: " + proveedor.getTelefono());
        }
    }

    public Proveedor obtenerDatosProveedor() {
        System.out.print("Nombre: ");
        String nombre = lectorEntrada.nextLine();
        System.out.print("CIF: ");
        String codigoIdentificacionFiscal = lectorEntrada.nextLine();
        System.out.print("Teléfono: ");
        String numeroTelefono = lectorEntrada.nextLine();
        return new Proveedor(0, nombre, codigoIdentificacionFiscal, numeroTelefono);
    }

    public void mostrarArticulos(List<Articulo> listaArticulos) {
        for (Articulo articulo : listaArticulos) {
            System.out.println("ID: " + articulo.getIdArticulo() +
                    ", Nombre: " + articulo.getNombre() +
                    ", Precio: " + articulo.getPrecioUnitario() +
                    ", Stock: " + articulo.getStock());
        }
    }

    public Articulo obtenerDatosArticulo() {
        System.out.print("Nombre: ");
        String nombre = lectorEntrada.nextLine();
        System.out.print("Precio unitario: ");
        double precioPorUnidad = Double.parseDouble(lectorEntrada.nextLine());
        System.out.print("Stock: ");
        int cantidadStock = Integer.parseInt(lectorEntrada.nextLine());
        return new Articulo(0, nombre, precioPorUnidad, cantidadStock);
    }

    public void mostrarFacturasRecibidas(List<FacturaRecibida> listaFacturas, List<Proveedor> listaProveedores) {
        for (FacturaRecibida factura : listaFacturas) {
            String nombreProveedor = listaProveedores.stream()
                    .filter(proveedor -> proveedor.getIdProveedor() == factura.getIdProveedor())
                    .findFirst()
                    .map(Proveedor::getNombre)
                    .orElse("Desconocido");
            System.out.println("ID: " + factura.getIdFactura() +
                    ", Proveedor: " + nombreProveedor +
                    ", Fecha: " + factura.getFecha() +
                    ", Total: " + factura.getTotal());
        }
    }

    public FacturaRecibida obtenerDatosFacturaRecibida() {
        System.out.print("ID del proveedor: ");
        int identificadorProveedor = Integer.parseInt(lectorEntrada.nextLine());
        System.out.print("Fecha (YYYY-MM-DD): ");
        java.sql.Date fechaEmision = java.sql.Date.valueOf(lectorEntrada.nextLine());
        System.out.print("Total: ");
        double montoTotal = Double.parseDouble(lectorEntrada.nextLine());
        return new FacturaRecibida(0, identificadorProveedor, fechaEmision, montoTotal);
    }

    public void mostrarVentas(List<Venta> listaVentas, List<Cliente> listaClientes, List<Articulo> listaArticulos) {
        for (Venta venta : listaVentas) {
            String nombreCliente = listaClientes.stream()
                    .filter(cliente -> cliente.getIdCliente() == venta.getIdCliente())
                    .findFirst()
                    .map(Cliente::getNombre)
                    .orElse("Desconocido");
            String nombreArticulo = listaArticulos.stream()
                    .filter(articulo -> articulo.getIdArticulo() == venta.getIdArticulo())
                    .findFirst()
                    .map(Articulo::getNombre)
                    .orElse("Desconocido");
            System.out.println("ID: " + venta.getIdVenta() +
                    ", Cliente: " + nombreCliente +
                    ", Artículo: " + nombreArticulo +
                    ", Cantidad: " + venta.getCantidad() +
                    ", Fecha: " + venta.getFechaVenta());
        }
    }

    public Venta obtenerDatosVenta() {
        System.out.print("ID del cliente: ");
        int identificadorCliente = Integer.parseInt(lectorEntrada.nextLine());
        System.out.print("ID del artículo: ");
        int identificadorArticulo = Integer.parseInt(lectorEntrada.nextLine());
        System.out.print("Cantidad: ");
        int cantidadVendida = Integer.parseInt(lectorEntrada.nextLine());
        System.out.print("Fecha de venta (YYYY-MM-DD): ");
        java.sql.Date fechaDeVenta = java.sql.Date.valueOf(lectorEntrada.nextLine());
        return new Venta(0, identificadorCliente, identificadorArticulo, cantidadVendida, fechaDeVenta);
    }

    public void mostrarInformeVentas(ResultSet resultadoConsulta) throws SQLException {
        String clienteActual = "";
        double totalCliente = 0.0;
        System.out.println("\n=== Informe de Ventas por Cliente ===");
        while (resultadoConsulta.next()) {
            String cliente = resultadoConsulta.getString("nombre");
            if (!cliente.equals(clienteActual)) {
                if (!clienteActual.isEmpty()) {
                    System.out.println("Total gastado por " + clienteActual + ": " + totalCliente);
                    System.out.println("----------------------------------------");
                }
                clienteActual = cliente;
                totalCliente = 0.0;
                System.out.println("Cliente: " + cliente);
            }
            double totalVenta = resultadoConsulta.getDouble("total");
            totalCliente += totalVenta;
            System.out.println("  Artículo: " + resultadoConsulta.getString("articulo") +
                    ", Cantidad: " + resultadoConsulta.getInt("cantidad") +
                    ", Fecha: " + resultadoConsulta.getDate("fecha_venta") +
                    ", Total: " + totalVenta);
        }
        if (!clienteActual.isEmpty()) {
            System.out.println("Total gastado por " + clienteActual + ": " + totalCliente);
        }
    }

    public void mostrarMensaje(String mensaje) {
        System.out.println(mensaje);
    }

    public void cerrarScanner() {
        lectorEntrada.close();
    }
}