public class Cuadrado implements Figura {
	double lado;
	
	public Cuadrado (double lado) {
		this.lado = lado;
	}
	public void calcularArea() {
		double area = lado * lado;
		System.out.println("El area del cuadrado es: " + area);
	}
}
