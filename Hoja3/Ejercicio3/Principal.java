class Calculadora {
    public int doble(int numero) {
        return numero * 2;
    }
}


public class Principal {
    public static void main(String[] args) {
        Calculadora calculadora = new Calculadora();
        int numero = 7;
        int resultado = calculadora.doble(numero);
        
        System.out.println("El doble de " + numero + " es: " + resultado);
    }
}
