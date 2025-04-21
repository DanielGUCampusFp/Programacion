import java.util.ArrayList;

public class Creador {
    int id;
    String nombre;
    String plataforma;
    ArrayList<Contenido> contenidos;
    ArrayList<Colaboracion> colaboraciones;

    public Creador(int id, String nombre, String plataforma) {
        this.id = id;
        this.nombre = nombre;
        this.plataforma = plataforma;
        this.contenidos = new ArrayList<>();
        this.colaboraciones = new ArrayList<>();
    }

    public void mostrar() {
        System.out.println("Creador: \n- ID: " + id + "\n- Nombre: " + nombre + 
                           "\n- Plataforma: " + plataforma + "\n- Número de Contenidos: " + contenidos.size() + 
                           "\n- Número de Colaboraciones: " + colaboraciones.size() + "\n");
    }

    public void agregarContenido(Contenido contenido) {
        contenidos.add(contenido);
    }

    public void agregarColaboracion(Colaboracion colaboracion) {
        colaboraciones.add(colaboracion);
    }

    public ArrayList<Contenido> getContenidos() {
        return contenidos;
    }

    public ArrayList<Colaboracion> getColaboraciones() {
        return colaboraciones;
    }
}