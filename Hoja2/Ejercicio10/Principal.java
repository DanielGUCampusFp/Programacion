class Proceso {
	void pasoUno() {
		System.out.println("Iniciando proceso...");
	}
	
	void pasoDos() {
		pasoUno();
		System.out.println("Proceso completado.");
	}
}


public class Principal {
    public static void main(String[] args) {
        Proceso proceso = new Proceso();
	proceso.pasoDos();
    }
}