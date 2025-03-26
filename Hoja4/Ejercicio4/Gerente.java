package Ejercicio4;

public class Gerente extends Empleado {
    private String nivel;

    public Gerente(String nombre, double salario, String departamento, String nivel) {
        super(nombre, salario, departamento);
        this.nivel = nivel;
    }

    public void mostrarDatosGerente() {
        System.out.println("Nombre: " + nombre);
        // System.out.println("Salario: " + salario); // ERROR: privado
        System.out.println("Departamento: " + departamento);
        System.out.println("Nivel: " + nivel);
    }
}

