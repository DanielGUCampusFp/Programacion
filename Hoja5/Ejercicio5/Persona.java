public class Persona {
	String nombre;
	int edad;
	
	public Persona (String nombre, int edad) {
		this.nombre = nombre;
		this.edad = edad;
	}
	
	public String getNombre() {
		return nombre;
	}
	
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	
	public int getEdad() {
		return edad;
	}
	
	public void setNombre(int edad) {
		this.edad = edad;
	}
	
	public void mostrarDatos() {
		System.out.println("Mi nombre es " + nombre + " y tengo " + edad + " años.");
	}
}
