import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class Producto {
	public static void main(String[] args) {
	HashMap<String, Double> precios = new HashMap<>();
	precios.put("Manzana", 5.31);
	precios.put("Platano", 3.64);
	precios.put("Trufa", 69.69);
	precios.put("Casa en la Playa", 80.43);
	
	Iterator<Map.Entry<String, Double>> it = precios.entrySet().iterator();
	while (it.hasNext()) {
	    	Map.Entry<String, Double> entry = it.next();
	    	if (entry.getValue() > 50.00) {
	    		System.out.println(entry.getKey() + " cuesta " + entry.getValue() + " euros");
	    	}
	   }
	}
}