package Ejercicio1;

public class Principal {

	public static void main(String[] args) {
		Persona persona1 = new Persona("Raúl", 18);
		Persona persona2 = new Persona("Héctor", 18);
		
        System.out.println("Datos de la primera persona:");
        persona1.mostrarDatos();

        System.out.println("\nDatos de la segunda persona:");
        persona2.mostrarDatos();
	}

}
