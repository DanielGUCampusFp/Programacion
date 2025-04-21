public abstract class Vehiculo {
    int codigo;
    int anioAdquisicion;
    int numPlazas;

    public Vehiculo(int codigo, int anioAdquisicion, int numPlazas) {
        this.codigo = codigo;
        this.anioAdquisicion = anioAdquisicion;
        this.numPlazas = numPlazas;
    }

    public abstract void mostrar();

    public abstract String getTipo();
}