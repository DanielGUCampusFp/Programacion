public class Principal {
    public static void main(String[] args) {
        Persona persona1 = new Persona("Carlos", 30);
        Persona persona2 = new Estudiante("Ana", 20, "Matemáticas");

        persona1.mostrarDatos(); 
        persona2.mostrarDatos();
    }
}
