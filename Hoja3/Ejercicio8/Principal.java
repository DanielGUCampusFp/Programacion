import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int numero;
	int suma = 0;	

        do {
            System.out.print("Ingrese un número (0 para salir): ");
            numero = scanner.nextInt();
            suma += numero;
        } while (numero != 0);

        System.out.println("La suma total es: " + suma);
        scanner.close();
    }
}
