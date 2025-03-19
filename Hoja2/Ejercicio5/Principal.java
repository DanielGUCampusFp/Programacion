import operaciones.Multiplicador;

public class Principal {
    public static void main(String[] args) {
        Multiplicador multiplicador = new Multiplicador();
        int resultado = multiplicador.multiplicar(4, 5);
        System.out.println("El resultado de la multiplicación es: " + resultado);
    }
}
