import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		ArrayList<Figura> figuras = new ArrayList<>();

		figuras.add(new Circulo("Rojo", 3.34));
		figuras.add(new Circulo("Azul", 6.45));
		figuras.add(new Rectangulo("Amarillo", 2.45, 9.43));
		figuras.add(new Rectangulo("Morado", 7.65, 2.22));
		
		double sumaAreas = 0;
		for (Figura figura : figuras) {
			sumaAreas += ((Calculable)figura).calcularArea();
		    }
	       
		System.out.printf("El área total de todas las figuras es: %.2f", sumaAreas);
	}
}

