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
        scanner.close();
    }
}