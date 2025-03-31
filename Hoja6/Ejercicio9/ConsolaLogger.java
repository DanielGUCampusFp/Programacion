public class ConsolaLogger implements Logger {
	public void registrar(String mensaje) {
		System.out.println("Registrando Mensaje: " + mensaje);
	}
	
	public void separador() {
		System.out.println("-----------------");
	}
}
