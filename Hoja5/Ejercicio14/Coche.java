public class Coche extends Vehiculo {
    int numPuertas;

    public Coche(String marca, String modelo, int numPuertas) {
        super(marca, modelo);
        this.numPuertas = numPuertas;
    }

    @Override
    public void mostrarDatos() {
        super.mostrarDatos();
        System.out.println("Número de puertas: " + numPuertas);
    }
}