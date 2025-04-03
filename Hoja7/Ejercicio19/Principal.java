import java.util.ArrayList;
import java.util.HashMap;

public class Principal {
	public static void main(String[] args) {
		ArrayList<Sensor> sensores = new ArrayList<>();
		sensores.add(new SensorTemperatura("1", "Pinto"));
		sensores.add(new SensorTemperatura("2", "Valdemoro"));
		sensores.add(new SensorHumedad("1", "Pinto"));
		sensores.add(new SensorHumedad("2", "Valdemoro"));

		HashMap<String, Double> ultimaLectura = new HashMap<>();
		
		for (Sensor sensor : sensores) {
            double valor = ((Medible)sensor).leerValor();
            System.out.println("Sensor " + sensor.id + " ubicado en " + sensor.ubicacion + " es de: " + valor + " " + ((Medible)sensor).getUnidad());
            ultimaLectura.put(sensor.id, valor);
		}
		System.out.println(ultimaLectura);
	}
	
}
