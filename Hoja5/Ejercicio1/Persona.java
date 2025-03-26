public class Persona {
	String nombre;
	int edad;
	
	public Persona (String nombre, int edad) {
		this.nombre = nombre;
		this.edad = edad;
	}
	
	public void mostrarDatos() {
		System.out.println("Mi nombre es " + nombre + " y tengo " + edad + " años.");
	}
}
