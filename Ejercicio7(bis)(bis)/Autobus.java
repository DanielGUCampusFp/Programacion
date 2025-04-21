public class Autobus extends Vehiculo {
    boolean adaptadoMovilidadReducida;

    public Autobus(int codigo, int anioAdquisicion, int numPlazas, boolean adaptadoMovilidadReducida) {
        super(codigo, anioAdquisicion, numPlazas);
        this.adaptadoMovilidadReducida = adaptadoMovilidadReducida;
    }

    @Override
    public void mostrar() {
        System.out.println("Autobús: \n- Código: " + codigo + "\n- Año de Adquisición: " + anioAdquisicion + 
                           "\n- Número de Plazas: " + numPlazas + "\n- Adaptado para Movilidad Reducida: " + 
                           adaptadoMovilidadReducida + "\n");
    }

    @Override
    public String getTipo() {
        return "Autobús";
    }
}