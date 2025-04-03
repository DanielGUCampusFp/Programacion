public class NotificacionEmail implements Notificable {
	String direccionCorreo;
	
	public NotificacionEmail(String direccionCorreo) {
		this.direccionCorreo = direccionCorreo;
	}
	
	@Override
	public void enviar(String mensaje) {
		System.out.println("El mensaje se envía a: " + direccionCorreo + " y es este: " + mensaje);
	}
}
