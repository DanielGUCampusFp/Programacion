public class SensorHumedad extends Sensor implements Medible {

	public SensorHumedad(String id, String ubicacion) {
		super(id, ubicacion);
	}

	@Override
	public double leerValor() {
		return 60;
	}
	
	@Override
	public String getUnidad() {
		return "%";
	}
}
