public class Video extends Contenido {
    int duracion;

    public Video(String titulo, String fechaPublicacion, int duracion) {
        super(titulo, fechaPublicacion);
        this.duracion = duracion;
    }

    @Override
    public void mostrar() {
        System.out.println("Video: \n- Título: " + titulo + "\n- Fecha de Publicación: " + fechaPublicacion + 
                           "\n- Duración: " + duracion + " minutos\n");
    }
}