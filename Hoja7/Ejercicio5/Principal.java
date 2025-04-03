import java.util.HashMap;
import java.util.Scanner;

public class Principal {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		HashMap<String, Integer> edades = new HashMap<>();
		edades.put("Daniel", 18);
		edades.put("Hector", 69);
		
		System.out.println("Introduce un nombre para saber su edad: ");
		String nombre = scanner.next();
		System.out.println("La edad de " + nombre + " es de " + edades.get(nombre) + " años.");
		
		scanner.close();
	}
}
