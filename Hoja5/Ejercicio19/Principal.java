public class Principal {
    public static void main(String[] args) {
        Persona p1 = new Estudiante("Juan", 20, "Historia");
        Persona p2 = new Profesor("Laura", 50, "Física");

        if (p1 instanceof Estudiante) {
            System.out.println(p1.getNombre() + " es un estudiante.");
        }
        if (p2 instanceof Profesor) {
            System.out.println(p2.getNombre() + " es un profesor.");
        }
    }
}
