public class EmpleadoFijo extends Empleado implements Pagable {
	double salarioBase;
	
	public EmpleadoFijo(String nombre, int id, double salarioBase) {
		super(id, nombre);
		this.salarioBase = salarioBase;
	}
	
	@Override
	public double calcularSalarioMensual() {
		return salarioBase; 
	}
}
