import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		ArrayList<String> tareas = new ArrayList<>();
		tareas.add("Hacer la compra");
		tareas.add("Limpiar la ventana");
		tareas.add("Sacar al perro");
		
		System.out.println(tareas);
		tareas.remove("Sacar al perro");       
		System.out.println(tareas);
	}
}
