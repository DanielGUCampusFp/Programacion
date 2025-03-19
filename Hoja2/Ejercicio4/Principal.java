class Comparador {
	void compararNumeros(int a, int b) {
        if (a > b) {
            	System.out.println(a + " es mayor que " + b);
        } else if (a < b) {
            	System.out.println(a + " es menor que " + b);
        } else {
            	System.out.println(a + " es igual a " + b);
        }
    }
}

public class Principal {
    public static void main(String[] args) {
        Comparador comparador = new Comparador();
        comparador.compararNumeros(10, 5);
    }
}