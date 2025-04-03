import java.util.HashMap;
import java.util.Map;

public class Principal {
	public static void main(String[] args) {
		HashMap<Integer, Empleado> empleados = new HashMap<>();
		empleados.put(1, new EmpleadoFijo("Daniel", 1, 1000));
		empleados.put(2, new EmpleadoFijo("Hector", 2, 1100));
		empleados.put(3, new EmpleadoPorHoras(1, "Raul", 8, 1000));
		empleados.put(4, new EmpleadoPorHoras(2, "Juanillo", 7, 900));
		
        for (Map.Entry<Integer, Empleado> entry : empleados.entrySet()) {
            Empleado empleado = entry.getValue();
            System.out.println("Empleado: " + empleado.nombre + ", Salario Mensual: " + ((Pagable)empleado).calcularSalarioMensual());
        }

	}
}
