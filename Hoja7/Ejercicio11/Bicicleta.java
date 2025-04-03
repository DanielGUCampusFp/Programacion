public class Bicicleta extends Vehiculo implements Movible {

	public Bicicleta(String id) {
		super(id);
	}

	@Override
	public void mover() {
		System.out.println("Bicicleta " + id + " pedalea por el carril bici");
	}
}
