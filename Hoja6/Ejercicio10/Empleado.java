public class Empleado implements Identificable {
	String nombre = "Daniel";
	int id = 1;
	
	public void mostrarIdentidad() {
		System.out.println("Nombre: " + nombre + " , ID: " + id);
	}
}
