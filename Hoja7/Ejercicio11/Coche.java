public class Coche extends Vehiculo implements Movible {

	public Coche(String id) {
		super(id);
	}
	
	@Override
	public void mover() {
		System.out.println("Coche " + id + " se mueve por carretera");
	}
}
