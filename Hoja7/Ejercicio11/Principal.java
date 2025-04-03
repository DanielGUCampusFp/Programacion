import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		ArrayList<Movible> vehiculos = new ArrayList<>();

		vehiculos.add(new Coche("B001"));
		vehiculos.add(new Coche("B002"));
		vehiculos.add(new Bicicleta("C001"));
		vehiculos.add(new Bicicleta("C002"));
		
		for (Movible vehiculo : vehiculos) {
			vehiculo.mover();
		}
	}
}