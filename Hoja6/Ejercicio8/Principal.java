public class Principal {
	public static void main(String[] args) {
		Cuadrado miC = new Cuadrado(2);
		Triangulo miT = new Triangulo(3, 5);
		
		miC.calcularArea();
		miT.calcularArea();
	}
}