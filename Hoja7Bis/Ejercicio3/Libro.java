public class Libro extends Material{
	String autor;
    int paginas;

    public Libro(String codigo, String titulo, int ano, String autor, int paginas) {
        super(codigo, titulo, ano);
        this.autor = autor;
        this.paginas = paginas;
    }
    
    @Override
    public void mostrar() {
        System.out.println("Libro - Código: " + codigo + ", Título: " + titulo + 
                          ", Año: " + ano + ", Autor: " + autor + ", Páginas: " + paginas);
    }
}
