public class Coche extends Vehiculo {
    private int puertas;

    public Coche(String marca, String modelo, int puertas) {
        super(marca, modelo);
        this.puertas = puertas;
    }
    
    public void mostrarDatos() {
        System.out.println("Marca: " + marca);
        System.out.println("Modelo: " + modelo);
        System.out.println("Número de puertas: " + puertas);
    }
    
    @Override
    public void describir() {
    	System.out.println("\nSoy un coche de marca " + marca + " y modelo " + modelo + ".");
    }
}