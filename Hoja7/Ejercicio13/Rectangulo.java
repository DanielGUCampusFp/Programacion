public class Rectangulo extends Figura implements Calculable {
	double ancho;
	double alto;
	
	public Rectangulo(String color, double alto, double ancho) {
		super(color);
		this.alto = alto;
		this.ancho = ancho;
	}

	@Override
	public double calcularArea() {
		return ancho * alto;
	}
}
