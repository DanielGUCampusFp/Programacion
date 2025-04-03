import java.util.Collections;
import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		ArrayList<Integer> numeros = new ArrayList<>();
		numeros.add(15);
		numeros.add(5);
		numeros.add(10);
		
		Collections.sort(numeros);
		System.out.println(numeros);
	}
}
