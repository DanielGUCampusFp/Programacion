public class Profesor extends Persona {
    String asignatura;

    public Profesor(String nombre, int edad, String asignatura) {
        super(nombre, edad);
        this.asignatura = asignatura;
    }

    public String getAsignatura() {
        return asignatura;
    }

    @Override
    public void mostrarDatos() {
        super.mostrarDatos();
        System.out.println("Soy profesor de " + asignatura + ".");
    }
}
