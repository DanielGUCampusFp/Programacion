class Mensaje {
	String texto = "¡Bienvenido al curso de Java!";
	
	void mostrarMensaje() {
		System.out.println(texto);
	}
}


public class Principal {
    public static void main(String[] args) {
        Mensaje mensaje = new Mensaje();
	mensaje.mostrarMensaje();
    }
}