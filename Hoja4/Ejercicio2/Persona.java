package Ejercicio2;

public class Persona {
	String nombre;
	int edad;
	
    public Persona() {
        this.nombre = "Desconocido";
        this.edad = 0;
    }
    
    public Persona(String nombre) {
        this.nombre = nombre;
        this.edad = 0;
    }
    
    public Persona(String nombre, int edad) {
        this.nombre = nombre;
        this.edad = edad;
    }
	
	void mostrarDatos() {
		System.out.println("Nombre : " + nombre);
		System.out.println("Edad: " + edad);
	}
}
