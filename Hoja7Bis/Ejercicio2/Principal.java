import java.util.ArrayList;

public class Principal {
    public static void main(String[] args) {
    	ArrayList<Material> materiales = new ArrayList<>();
        materiales.add(new Libro("L001", "Programación en Java", 2021, "Ana García", 350));
        materiales.add(new Revista("R010", "Ciencia Escolar", 2023, 12, true));
        materiales.add(new Libro("L002", "Matemáticas Básicas", 2019, "Carlos Ruiz", 200));
        materiales.add(new Revista("R011", "Arte y Diseño", 2022, 7, false));

        for (Material material : materiales) {
        	material.mostrar();
        }
    }
}