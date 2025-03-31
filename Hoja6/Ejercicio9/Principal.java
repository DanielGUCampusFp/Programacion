public class Principal {
	public static void main(String[] args) {
		ConsolaLogger miConsola = new ConsolaLogger();
		
		miConsola.registrar("Usuario iniciando sesion");
		miConsola.separador();
		miConsola.registrar("Usuario saliendo de la sesion");
	}
}
