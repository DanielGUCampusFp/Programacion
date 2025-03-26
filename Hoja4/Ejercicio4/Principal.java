package Ejercicio4;

public class Principal {
    public static void main(String[] args) {
        Empleado empleado1 = new Empleado("Daniel", 2500.00, "Ventas");

        System.out.println("Datos del empleado:");
        empleado1.mostrarDatos();

        System.out.println("\nAcceso directo a atributos desde Principal:");
        System.out.println("Nombre: " + empleado1.nombre);
        // System.out.println("Salario: " + empleado1.salario); // ERROR: privado
        System.out.println("Departamento: " + empleado1.departamento);

        System.out.println("Salario (accedido con getSalario()): " + empleado1.getSalario());

        Gerente gerente1 = new Gerente("Raúl", 5000.00, "TI", "Senior");
        
        System.out.println("\nDatos del gerente:");
        gerente1.mostrarDatosGerente();
    }
}

