import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
    static Scanner scanner = new Scanner(System.in);
    static ArrayList<Creador> creadores = new ArrayList<>();

    public static void main(String[] args) {
        Creador creador1 = new Creador(1, "TechGuru", "YouTube");
        creador1.agregarContenido(new Video("Review Smartphone", "2025-04-01", 15));
        creador1.agregarColaboracion(new Colaboracion("Samsung", 6));
        Creador creador2 = new Creador(2, "FoodieStar", "Instagram");
        creador2.agregarContenido(new PublicacionPatrocinada("Receta Saludable", "2025-03-15", "Nestlé"));
        creador2.agregarColaboracion(new Colaboracion("Nestlé", 3));
        creadores.add(creador1);
        creadores.add(creador2);

        int opcion;
        do {
            System.out.println("\n--- GESTOR DE CREADORES DIGITALES ---");
            System.out.println("1. Añadir nuevo creador");
            System.out.println("2. Mostrar todos los creadores");
            System.out.println("3. Añadir contenido a un creador");
            System.out.println("4. Añadir colaboración");
            System.out.println("5. Ver contenidos de un creador");
            System.out.println("6. Ver colaboraciones de un creador");
            System.out.println("7. Eliminar creador");
            System.out.println("8. Salir");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            switch (opcion) {
                case 1: añadirCreador(); 
                	break;
                case 2: mostrarCreadores(); 
                	break;
                case 3: añadirContenido(); 
                	break;
                case 4: añadirColaboracion(); 
                	break;
                case 5: verContenidos(); 
                	break;
                case 6: verColaboraciones(); 
                	break;
                case 7: eliminarCreador(); 
                	break;
                case 8: System.out.println("¡Hasta pronto!"); 
                	break;
                default: System.out.println("Opción no válida");
            }
        } while (opcion != 8);
    }

    public static void añadirCreador() {
        System.out.print("Introduce el ID del creador: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        // Check for duplicate ID
        for (Creador creador : creadores) {
            if (creador.id == id) {
                System.out.println("Ya existe un creador con ese ID. No se ha añadido.");
                return;
            }
        }

        System.out.print("Introduce el nombre del creador: ");
        String nombre = scanner.nextLine();

        System.out.print("Introduce la plataforma (ej. YouTube, Instagram): ");
        String plataforma = scanner.nextLine();

        creadores.add(new Creador(id, nombre, plataforma));
        System.out.println("¡Creador añadido correctamente!");
    }

    public static void mostrarCreadores() {
        if (creadores.isEmpty()) {
            System.out.println("No hay creadores registrados.");
        } else {
            for (Creador creador : creadores) {
                creador.mostrar();
            }
        }
    }

    public static void añadirContenido() {
        System.out.print("Introduce el ID del creador: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        Creador creador = buscarCreador(id);
        if (creador == null) {
            System.out.println("No se encontró un creador con ese ID.");
            return;
        }

        System.out.print("¿Video o Publicación Patrocinada? ");
        String tipo = scanner.nextLine().toUpperCase().intern();

        System.out.print("Introduce el título del contenido: ");
        String titulo = scanner.nextLine();

        System.out.print("Introduce la fecha de publicación: ");
        String fecha = scanner.nextLine();

        if (tipo == "VIDEO") {
            System.out.print("Introduce la duración en minutos: ");
            int duracion = scanner.nextInt();
            scanner.nextLine();
            creador.agregarContenido(new Video(titulo, fecha, duracion));
        } else if (tipo == "PUBLICACIÓN PATROCINADA" || tipo == "PUBLICACION PATROCINADA") {
            System.out.print("Introduce la marca patrocinadora: ");
            String marca = scanner.nextLine();
            creador.agregarContenido(new PublicacionPatrocinada(titulo, fecha, marca));
        } else {
            System.out.println("Tipo de contenido no válido.");
            return;
        }
        System.out.println("¡Contenido añadido correctamente!");
    }

    public static void añadirColaboracion() {
        System.out.print("Introduce el ID del creador: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        Creador creador = buscarCreador(id);
        if (creador == null) {
            System.out.println("No se encontró un creador con ese ID.");
            return;
        }

        System.out.print("Introduce la marca de la colaboración: ");
        String marca = scanner.nextLine();

        System.out.print("Introduce la duración en meses: ");
        int duracionMeses = scanner.nextInt();
        scanner.nextLine();

        creador.agregarColaboracion(new Colaboracion(marca, duracionMeses));
        System.out.println("¡Colaboración añadida correctamente!");
    }

    public static void verContenidos() {
        System.out.print("Introduce el ID del creador: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        Creador creador = buscarCreador(id);
        if (creador == null) {
            System.out.println("No se encontró un creador con ese ID.");
            return;
        }

        ArrayList<Contenido> contenidos = creador.getContenidos();
        if (contenidos.isEmpty()) {
            System.out.println("Este creador no tiene contenidos registrados.");
        } else {
            System.out.println("Contenidos de " + creador.nombre + ":");
            for (Contenido contenido : contenidos) {
                contenido.mostrar();
            }
        }
    }

    public static void verColaboraciones() {
        System.out.println("Introduce el ID del creador: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        Creador creador = buscarCreador(id);
        if (creador == null) {
            System.out.println("No se encontró un creador con ese ID.");
            return;
        }

        ArrayList<Colaboracion> colaboraciones = creador.getColaboraciones();
        if (colaboraciones.isEmpty()) {
            System.out.println("Este creador no tiene colaboraciones registradas.");
        } else {
            System.out.println("Colaboraciones de " + creador.nombre + ":");
            for (Colaboracion colaboracion : colaboraciones) {
                colaboracion.mostrar();
            }
        }
    }

    public static void eliminarCreador() {
        System.out.print("Introduce el ID del creador a eliminar: ");
        int id = scanner.nextInt();
        scanner.nextLine();

        for (int i = 0; i < creadores.size(); i++) {
            Creador creador = creadores.get(i);
            if (creador.id == id) {
                System.out.print("¿Seguro que quieres eliminar al creador " + creador.nombre + "? (sí/no): ");
                String confirmacion = scanner.nextLine().toLowerCase().intern();

                if (confirmacion == "sí" || confirmacion == "si") {
                    creadores.remove(i);
                    System.out.println("Creador eliminado correctamente.");
                } else {
                    System.out.println("Eliminación cancelada.");
                }
                return;
            }
        }
        System.out.println("No se encontró un creador con ese ID.");
    }

    private static Creador buscarCreador(int id) {
        for (Creador creador : creadores) {
            if (creador.id == id) {
                return creador;
            }
        }
        return null;
    }
}