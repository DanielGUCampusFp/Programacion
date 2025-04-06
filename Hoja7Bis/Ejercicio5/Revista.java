public class Revista extends Material {
	int edicion;
    boolean mensual;

    public Revista(String codigo, String titulo, int ano, int edicion, boolean mensual) {
        super(codigo, titulo, ano);
        this.edicion = edicion;
        this.mensual = mensual;
    }
    
    @Override
    public void mostrar() {
        System.out.println("Revista - Código: " + codigo + ", Título: " + titulo + 
                          ", Año: " + ano + ", Nº edición: " + edicion + 
                          ", Mensual: " + (mensual ? "sí" : "no"));
    }
}
