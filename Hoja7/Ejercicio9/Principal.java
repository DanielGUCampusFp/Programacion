import java.util.Iterator;
import java.util.ArrayList;


public class Principal {
	public static void main(String[] args) {
		ArrayList<String> frutas = new ArrayList<>();
		frutas.add("Manzana");
		frutas.add("Pera");
		frutas.add("Plantano");
		frutas.add("Cereza");
		
		Iterator<String> it = frutas.iterator();
		while (it.hasNext()) {
		    String f = it.next();
		    if (f.equals("Manzana")) {
		        it.remove();
		    }
		}
		System.out.println(frutas);
	}
}
