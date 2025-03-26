public class Principal {
    public static void main(String[] args) {
        Figura cuadrado = new Cuadrado(5);
        Figura triangulo = new Triangulo(4, 3);

        System.out.println("Área del cuadrado: " + cuadrado.calcularArea());
        System.out.println("Área del triángulo: " + triangulo.calcularArea());
    }
}