import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
	static Scanner scanner = new Scanner(System.in);
    static ArrayList<Material> materiales = new ArrayList<>();
    
    public static void main(String[] args) {
    	materiales.add(new Libro("L001", "Programación en Java", 2021, "Ana García", 350));
        materiales.add(new Revista("R010", "Ciencia Escolar", 2023, 12, true));
        materiales.add(new Libro("L002", "Matemáticas Básicas", 2019, "Carlos Ruiz", 200));
        materiales.add(new Revista("R011", "Arte y Diseño", 2022, 7, false));

        int opcion;
        do {
            System.out.println("\n--- MENÚ BIBLIOTECA ESCOLAR ---");
            System.out.println("1. Añadir material");
            System.out.println("2. Mostrar todos los materiales");
            System.out.println("3. Buscar material por código");
            System.out.println("4. Eliminar material");
            System.out.println("5. Salir");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            switch (opcion) {
                case 1: añadirMaterial(); break;
                case 2: mostrarTodosMateriales(); break;
                case 3: buscarMaterial(); break;
                case 4: eliminarMaterial(); break;
                case 5: System.out.println("¡Hasta pronto!"); break;
                default: System.out.println("Opción no válida");
            }
        } while (opcion != 5);
    }

    public static void añadirMaterial() {
        System.out.print("¿Libro (L) o Revista (R)? ");
        String tipo = scanner.nextLine().toUpperCase().intern();
        
        System.out.print("Introduce el código: ");
        String codigo = scanner.nextLine().intern();
        
        for (Material material : materiales) {
            if (material.getCodigo() == codigo) {
                System.out.println("Ya existe un material con ese código. No se ha añadido.");
                return;
            }
        }

        System.out.print("Introduce el título: ");
        String titulo = scanner.nextLine();
        System.out.print("Introduce el año: ");
        int ano = scanner.nextInt();
        scanner.nextLine();

        if (tipo == "L") {
            System.out.print("Introduce el autor: ");
            String autor = scanner.nextLine();
            System.out.print("Introduce el número de páginas: ");
            int paginas = scanner.nextInt();
            scanner.nextLine();
            materiales.add(new Libro(codigo, titulo, ano, autor, paginas));
        } else if (tipo == "R") {
            System.out.print("Introduce el número de edición: ");
            int edicion = scanner.nextInt();
            scanner.nextLine();
            System.out.print("¿Es mensual? (sí/no): ");
            String respuesta = scanner.nextLine().intern();
            boolean mensual = respuesta == "sí";
            materiales.add(new Revista(codigo, titulo, ano, edicion, mensual));
        }
        System.out.println("¡Material añadido correctamente!");
    }

    public static void mostrarTodosMateriales() {
        for (Material material : materiales) {
            material.mostrar();
        }
    }

    public static void buscarMaterial() {
        System.out.print("Introduce el código del material a buscar: ");
        String codigo = scanner.nextLine().intern();
        boolean encontrado = false;
        
        for (Material material : materiales) {
            if (material.getCodigo() == codigo) {
            	material.mostrar();
                encontrado = true;
                break;
            }
        }
        if (!encontrado) {
            System.out.println("No se ha encontrado ningún material con ese código.");
        }
    }

    public static void eliminarMaterial() {
        System.out.print("Introduce el código del material a eliminar: ");
        String codigo = scanner.nextLine().intern();
        
        for (int i = 0; i < materiales.size(); i++) {
            if (materiales.get(i).getCodigo() == codigo) {
                materiales.remove(i);
                System.out.println("Material eliminado correctamente.");
                return;
            }
        }
        System.out.println("No se ha encontrado ningún material con ese código.");
    }
}