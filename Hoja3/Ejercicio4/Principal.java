class Comparador {
    void comparar(int a, int b) {
        if (a > b) {
            System.out.println(a + " es mayor que " + b);
        } else if (a < b) {
            System.out.println(a + " es menor que " + b);
        } else {
            System.out.println(a + " y " + b + " son iguales");
        }
    }
}


public class Principal {
    public static void main(String[] args) {
        Comparador comparador = new Comparador();

        comparador.comparar(10, 5);
        comparador.comparar(7, 12);
        comparador.comparar(8, 8);
    }
}

