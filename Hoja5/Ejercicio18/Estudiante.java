public class Estudiante extends Persona {
	String curso;
	public Estudiante(String nombre, int edad, String curso) {
		super(nombre, edad);
		this.curso = curso;
	}
	@Override
	public void mostrarDatos() {
		System.out.println("Mi nombre es " + nombre + " ,tengo " + edad + " años y voy a " + curso + ".");
	}
}
