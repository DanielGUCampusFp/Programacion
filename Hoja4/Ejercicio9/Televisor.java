public class Televisor extends Electrodomestico{
	float pulgadas;
	
	public Televisor(String marca, double precio, float pulgadas) {
		super(marca, precio);
		this.pulgadas = pulgadas;
	}
	
    public void mostrarDatos() {
        System.out.println("Televisor - Marca: " + marca + ", Precio: " + precio + "€, Pulgadas: " + pulgadas + ".");
    }
}
