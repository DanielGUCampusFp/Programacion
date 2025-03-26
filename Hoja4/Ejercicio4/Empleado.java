package Ejercicio4;

public class Empleado {
	public String nombre;
	private double salario;
	protected String departamento;
	
	public Empleado(String nombre, double salario, String departamento) {
		this.nombre = nombre;
		this.salario = salario;
		this.departamento = departamento;
	}
	
    public void mostrarDatos() {
        System.out.println("Nombre: " + nombre);
        System.out.println("Salario: " + salario);
        System.out.println("Departamento: " + departamento);
    }
    
    public double getSalario() {
        return salario;
    }
}
