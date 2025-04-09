public abstract class Animal {
	// Añado los atributos correspondientes a Animal
	int numChip;
	String nombre;
	int edad;
	String raza;
	boolean adoptado;
	
	// Hago un construct para inicializar los atributos
	public Animal(int numChip, String nombre, int edad, String raza, boolean adoptado) {
		this.numChip = numChip;
		this.nombre = nombre;
		this.edad = edad;
		this.raza = raza;
		this.adoptado = adoptado;
	}
	
	// Creo el metodo abstracto mostrar para luego sobrescribirlo en las clases Perro y Gato
	public abstract void mostrar();
	// Creo otro metodo para utilizarlo en el main para sacar el tipo de animal que es
	public abstract String getTipo();
}
