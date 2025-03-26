public class Lavadora extends Electrodomestico {
	double capacidadKg;
	
	public Lavadora(String marca, double precio, double capacidadKg) {
		super(marca, precio);
		this.capacidadKg = capacidadKg;
	}
	
    public void mostrarDatos() {
        System.out.println("Lavadora - Marca: " + marca + ", Precio: " + precio + "€, Capacidad: " + capacidadKg + " kg.");
    }
}
