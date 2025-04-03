public class Electronico extends Item implements Describible {
	String marca;
	
	public Electronico(int id, String marca) {
		super(id);
		this.marca = marca;
	}

	@Override
	public String describir() {
		return "Electrónico [ID=" + id + ", Marca=" + marca + "]";
	}

}
