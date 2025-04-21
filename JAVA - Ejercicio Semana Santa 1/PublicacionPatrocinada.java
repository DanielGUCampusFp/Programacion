public class PublicacionPatrocinada extends Contenido {
    String marca;

    public PublicacionPatrocinada(String titulo, String fechaPublicacion, String marca) {
        super(titulo, fechaPublicacion);
        this.marca = marca;
    }

    @Override
    public void mostrar() {
        System.out.println("Publicación Patrocinada: \n- Título: " + titulo + "\n- Fecha de Publicación: " + 
                           fechaPublicacion + "\n- Marca: " + marca + "\n");
    }
}