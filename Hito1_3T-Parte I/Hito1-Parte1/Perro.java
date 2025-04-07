public class Perro extends Animal {
	// Atributo especial de Perro
	String tamano;
	
	// Inicializamos este atributo especial de Perro y utilizo super para que herede los atributos de Animal
	public Perro(int numChip, String nombre, int edad, String raza, boolean adoptado, String tamano) {
		super(numChip, nombre, edad, raza, adoptado);
		this.tamano = tamano;
	}

	// Sobrescribo el metodo mostrar especificamente para Perro con su atributo tamaño
	@Override
	public void mostrar() {
		System.out.println("Perro: \n- Chip: " + numChip + "\n- Nombre: " + nombre + "\n- Edad: " + edad + "\n- Raza: " + raza + "\n- Adoptado: " + adoptado + "\n- Tamaño: " + tamano + "\n");
	}
}
