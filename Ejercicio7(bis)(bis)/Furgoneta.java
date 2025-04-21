public class Furgoneta extends Vehiculo {
    String tipoCarga;

    public Furgoneta(int codigo, int anioAdquisicion, int numPlazas, String tipoCarga) {
        super(codigo, anioAdquisicion, numPlazas);
        this.tipoCarga = tipoCarga;
    }

    @Override
    public void mostrar() {
        System.out.println("Furgoneta: \n- Código: " + codigo + "\n- Año de Adquisición: " + anioAdquisicion + 
                           "\n- Número de Plazas: " + numPlazas + "\n- Tipo de Carga/Uso: " + tipoCarga + "\n");
    }

    @Override
    public String getTipo() {
        return "Furgoneta";
    }
}