import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
    static Scanner scanner = new Scanner(System.in);
    static ArrayList<Vehiculo> flota = new ArrayList<>();

    public static void main(String[] args) {
        flota.add(new Autobus(101, 2015, 50, true));
        flota.add(new Autobus(102, 2018, 40, false));
        flota.add(new Furgoneta(201, 2020, 8, "Material Deportivo"));
        flota.add(new Furgoneta(202, 2019, 7, "Comida"));

        int opcion;
        do {
            System.out.println("\n--- SISTEMA DE GESTIÓN DE VEHÍCULOS ESCOLARES ---");
            System.out.println("1. Añadir vehículo");
            System.out.println("2. Mostrar todos los vehículos");
            System.out.println("3. Buscar vehículo por código");
            System.out.println("4. Eliminar vehículo");
            System.out.println("5. Salir");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            switch (opcion) {
                case 1: añadirVehiculo(); break;
                case 2: mostrarVehiculos(); break;
                case 3: buscarVehiculo(); break;
                case 4: eliminarVehiculo(); break;
                case 5: System.out.println("¡Hasta pronto!"); break;
                default: System.out.println("Opción no válida");
            }
        } while (opcion != 5);
    }

    public static void añadirVehiculo() {
        System.out.print("¿Autobús o Furgoneta? ");
        String tipo = scanner.nextLine().toUpperCase().intern();

        System.out.print("Introduce el código del vehículo: ");
        int codigo = scanner.nextInt();
        scanner.nextLine();

        for (Vehiculo vehiculo : flota) {
            if (vehiculo.codigo == codigo) {
                System.out.println("Ya existe un vehículo con ese código. No se ha añadido.");
                return;
            }
        }

        System.out.print("Introduce el año de adquisición: ");
        int anioAdquisicion = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Introduce el número de plazas: ");
        int numPlazas = scanner.nextInt();
        scanner.nextLine();

        if (tipo == "AUTOBÚS" || tipo == "AUTOBUS") {
            System.out.print("¿Está adaptado para movilidad reducida? (sí/no): ");
            String respuesta = scanner.nextLine().toLowerCase().intern();
            boolean adaptado = respuesta == "sí" || respuesta == "si";

            flota.add(new Autobus(codigo, anioAdquisicion, numPlazas, adaptado));
        } else if (tipo == "FURGONETA") {
            System.out.print("Introduce el tipo de carga/uso (ej. Material Deportivo, Comida): ");
            String tipoCarga = scanner.nextLine();

            flota.add(new Furgoneta(codigo, anioAdquisicion, numPlazas, tipoCarga));
        } else {
            System.out.println("Tipo de vehículo no válido.");
            return;
        }
        System.out.println("¡Vehículo añadido correctamente!");
    }

    public static void buscarVehiculo() {
        System.out.print("Introduce el código del vehículo: ");
        int codigo = scanner.nextInt();
        scanner.nextLine();

        for (Vehiculo vehiculo : flota) {
            if (vehiculo.codigo == codigo) {
                vehiculo.mostrar();
                return;
            }
        }
        System.out.println("No se ha encontrado ningún vehículo con ese código.");
    }

    public static void eliminarVehiculo() {
        System.out.print("Introduce el código del vehículo a eliminar: ");
        int codigo = scanner.nextInt();
        scanner.nextLine();

        for (int i = 0; i < flota.size(); i++) {
            Vehiculo vehiculo = flota.get(i);
            if (vehiculo.codigo == codigo) {
                String tipoVehiculo = vehiculo.getTipo();
                System.out.print("¿Seguro que quieres eliminar el " + tipoVehiculo + " con código " + codigo + "? (sí/no): ");
                String confirmacion = scanner.nextLine().toLowerCase().intern();

                if (confirmacion == "sí" || confirmacion == "si") {
                    flota.remove(i);
                    System.out.println("Vehículo eliminado correctamente.");
                } else {
                    System.out.println("Eliminación cancelada.");
                }
                return;
            }
        }
        System.out.println("No se ha encontrado ningún vehículo con ese código.");
    }

    public static void mostrarVehiculos() {
        if (flota.isEmpty()) {
            System.out.println("No hay vehículos registrados.");
        } else {
            for (Vehiculo vehiculo : flota) {
                vehiculo.mostrar();
            }
        }
    }
}