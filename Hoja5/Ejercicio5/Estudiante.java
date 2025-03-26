public class Estudiante extends Persona {
    private String curso;

    public Estudiante(String nombre, int edad, String curso) {
        super(nombre, edad);
        this.curso = curso;
        System.out.println("Estudiante creado: " + nombre + ", " + edad + " años, curso: " + curso);
    }

    @Override
    public void mostrarDatos() {
        System.out.println("Mi nombre es " + getNombre() + ", tengo " + getEdad() + " años y estudio " + curso + ".");
    }
}