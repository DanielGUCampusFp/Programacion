public class NotificacionSMS implements Notificable {
	String numeroTelefono;
	
	public NotificacionSMS(String numeroTelefono) {
		this.numeroTelefono = numeroTelefono;
	}
	
	@Override
	public void enviar(String mensaje) {
		System.out.println("El SMS se envía al telefono: " + numeroTelefono + " y es este: " + mensaje);
	}
}
