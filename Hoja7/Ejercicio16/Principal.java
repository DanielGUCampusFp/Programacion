import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class Principal {
	public static void main(String[] args) {
		HashMap<String, ArrayList<Item>> inventario = new HashMap<>();
        inventario.put("Libros", new ArrayList<>());
        inventario.put("Electrónicos", new ArrayList<>());

        inventario.get("Libros").add(new Libro(1, "El Quijote"));
        inventario.get("Libros").add(new Libro(2, "Cien Años de Soledad"));

        inventario.get("Electrónicos").add(new Electronico(101, "Samsung"));
        inventario.get("Electrónicos").add(new Electronico(102, "Apple"));

        for (Map.Entry<String, ArrayList<Item>> categoria : inventario.entrySet()) {
            System.out.println("Categoría: " + categoria.getKey());
            for (Item item : categoria.getValue()) {
                System.out.println("- " + ((Describible)item).describir());
            }
        }
	}
}
