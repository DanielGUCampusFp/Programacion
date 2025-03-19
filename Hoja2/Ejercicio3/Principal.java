class AreaCuadrado {
	int calcularArea(int lado) {
		return lado * lado;
	}
}

public class Principal {
	public static void main(String[] args) {
		AreaCuadrado area = new AreaCuadrado();
		int resultado = area.calcularArea(5);
		System.out.println(resultado);
	}
}