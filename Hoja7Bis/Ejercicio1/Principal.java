import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
    	ArrayList<Material> materiales = new ArrayList<>();
        materiales.add(new Libro("L001", "Programación en Java", 2021, "Ana García", 350));
        materiales.add(new Revista("R010", "Ciencia Escolar", 2023, 12, true));
        materiales.add(new Libro("L002", "Matemáticas Básicas", 2019, "Carlos Ruiz", 200));
        materiales.add(new Revista("R011", "Arte y Diseño", 2022, 7, false));

        Scanner scanner = new Scanner(System.in);

        System.out.print("¿Libro (L) o Revista (R)? ");
        String tipo = scanner.nextLine().toUpperCase().intern();

        System.out.print("Introduce el código: ");
        String codigo = scanner.nextLine();

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
            materiales.add(new Libro(codigo, titulo, ano, autor, paginas));
        } else if (tipo == "R") {
            System.out.print("Introduce el número de edición: ");
            int edicion = scanner.nextInt();
            System.out.print("¿Es mensual? (sí/no): ");
            boolean mensual = scanner.next() == "sí";
            materiales.add(new Revista(codigo, titulo, ano, edicion, mensual));
        }
        System.out.println("¡Material añadido correctamente!");
        scanner.close();
    }
}