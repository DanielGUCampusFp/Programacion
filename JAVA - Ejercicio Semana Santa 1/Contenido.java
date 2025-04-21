public abstract class Contenido {
    String titulo;
    String fechaPublicacion;

    public Contenido(String titulo, String fechaPublicacion) {
        this.titulo = titulo;
        this.fechaPublicacion = fechaPublicacion;
    }

    public abstract void mostrar();
}