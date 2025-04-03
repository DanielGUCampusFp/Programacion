import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<Animal> animales = new ArrayList<>();
		
        animales.add(new Perro("Illo"));
        animales.add(new Gato("Blanca"));
        animales.add(new Perro("Max"));
        animales.add(new Gato("Mishifu"));
        
        for (Animal animal : animales) {
        		System.out.println(animal.nombre  + " dice " + ((Comunicable) animal).hacerSonido());
        }
	}
}
