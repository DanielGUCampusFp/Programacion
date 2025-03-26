public class Libro {
	String titulo;
	String autor;
	
	public Libro(String titulo, String autor) {
		this.titulo = titulo;
		this.autor = autor;
	}
	
    public void mostrarDatos() {
        System.out.println("Título: " + titulo + ", Autor: " + autor);
    }
}
