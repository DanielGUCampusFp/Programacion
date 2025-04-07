public class Gato extends Animal {
	// Atributo especial de Gato
	boolean leucemia;
	
	// Inicializamos este atributo especial de Gato y utilizo super para que herede los atributos de Animal
	public Gato(int numChip, String nombre, int edad, String raza, boolean adoptado, Boolean leucemia) {
		super(numChip, nombre, edad, raza, adoptado);
		this.leucemia = leucemia;
	}

	// Sobrescribo el metodo mostrar especificamente para Gato con su atributo leucemia
	@Override
	public void mostrar() {
		System.out.println("Gato: \n- Chip: " + numChip + "\n- Nombre: " + nombre + "\n- Edad: " + edad + "\n- Raza: " + raza + "\n- Adoptado: " + adoptado + "\n- Leucemia: " + leucemia + "\n");
	}
}
