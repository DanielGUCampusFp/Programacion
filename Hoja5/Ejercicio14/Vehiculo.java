public class Vehiculo {
    String marca;
    String modelo;

    public Vehiculo(String marca, String modelo) {
        this.marca = marca;
        this.modelo = modelo;
    }

    public void mostrarDatos() {
        System.out.println("Marca: " + marca + ", Modelo: " + modelo);
    }
}