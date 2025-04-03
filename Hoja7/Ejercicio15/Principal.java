import java.util.LinkedList;

public class Principal {
	public static void main(String[] args) {
		LinkedList<Notificable> mensajes = new LinkedList<>();
		mensajes.add(new NotificacionEmail("daniel.gonzalez24@gmail.com"));
		mensajes.add(new NotificacionEmail("raul.benitez24@gmail.com"));
		mensajes.add(new NotificacionSMS("+34 666999777"));
		mensajes.add(new NotificacionSMS("+34 111222333"));

		for (Notificable mensaje : mensajes) {
			((Notificable)mensaje).enviar("Tienes un mensaje");
		}
	}
}
