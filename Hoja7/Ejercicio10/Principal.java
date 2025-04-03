import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		ArrayList<String> nombres = new ArrayList<>();
		nombres.add("Raul");
		nombres.add("Daniel");
		nombres.add("Hector");
		nombres.add("Juan");
		
		System.out.println("Lista de nombres: ");
		for (String nombre : nombres) {
		    System.out.println("- " + nombre);
		}

	}
}
