import java.io.Serializable;

public class Libro implements Serializable {
	private static final long serialVersionUID = 1L;
	String titulo;
	String autor;
	String isbn;
	int anoPublicacion;
	
	public Libro(String titulo, String autor, String isbn, int anoPublicacion) {
		this.titulo = titulo;
		this.autor = autor;
		this.isbn = isbn;
		this.anoPublicacion = anoPublicacion;
	}

	@Override
    public String toString() {
        return "Titulo = " + titulo + ", Autor/a = " + autor + ", ISBN = " + isbn + ", Año Publicacion = " + anoPublicacion;
    }
}
