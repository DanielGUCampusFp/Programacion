public class Principal {
	public static void main(String[] args) {
		CorreoElectronico miCorreo = new CorreoElectronico();
		MensajeTexto miMensaje = new MensajeTexto();
		
		miCorreo.enviarNotificacion();
		miMensaje.enviarNotificacion();
	}
}
