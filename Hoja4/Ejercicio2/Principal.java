package Ejercicio2;

public class Principal {

	public static void main(String[] args) {
		Persona persona1 = new Persona();
		Persona persona2 = new Persona("Héctor");
		Persona persona3 = new Persona("Héctor", 18);
		
        System.out.println("Datos de la primera persona:");
        persona1.mostrarDatos();

        System.out.println("\nDatos de la segunda persona:");
        persona2.mostrarDatos();

        System.out.println("\nDatos de la tercera persona:");
        persona3.mostrarDatos();
	}

}
