class OperacionesBasicas {	
	static void sumar(int a, int b) {
		int suma  = a + b;
		System.out.println("La suma de " + a + " y " + b + " es: " + suma);
	}
	static void restar(int a, int b) {
		int resta  = a - b;
		System.out.println("La resta de " + a + " y " + b + " es: " + resta);
	}

	static void multiplicar(int a, int b) {
		int multiplicacion  = a * b;
		System.out.println("La multiplicacion de " + a + " y " + b + " es: " + multiplicacion);
	}

	static void dividir(int a, int b) {
		int division  = a / b;
		System.out.println("La division de " + a + " y " + b + " es: " + division);
	}
}

public class Principal {
    public static void main(String[] args) {
        OperacionesBasicas.sumar(5, 5);
	OperacionesBasicas.restar(10, 5);
	OperacionesBasicas.multiplicar(10, 10);
	OperacionesBasicas.dividir(20, 2);
    }
}