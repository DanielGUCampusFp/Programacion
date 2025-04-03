import java.util.Scanner;

public class Principal {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		int[] numeros = new int[5];
		
		for (int i = 0; i < numeros.length; i++) {
			System.out.println("Ingresa un numero por favor: ");
		    numeros[i] = scanner.nextInt();
		}
		
		for (int i = 0; i < numeros.length; i++) {
		    System.out.println("Posición " + (i +1) + ": " + numeros[i]);
		}
		scanner.close();
	}
}
