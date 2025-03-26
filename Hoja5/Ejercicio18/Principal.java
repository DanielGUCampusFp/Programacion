public class Principal {
    public static void main(String[] args) {
        Persona persona1 = new Estudiante("María", 22, "Ingeniería");
        Persona persona2 = new Profesor("Carlos", 45, "Matemáticas");

        persona1.mostrarDatos();
        persona2.mostrarDatos();
    }
}
