public class Colaboracion {
    String marca;
    int duracionMeses;

    public Colaboracion(String marca, int duracionMeses) {
        this.marca = marca;
        this.duracionMeses = duracionMeses;
    }

    public void mostrar() {
        System.out.println("Colaboración: \n- Marca: " + marca + "\n- Duración: " + duracionMeses + " meses\n");
    }
}