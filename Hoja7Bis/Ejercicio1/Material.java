public abstract class Material {
	String codigo;
    String titulo;
    int ano;

    public Material(String codigo, String titulo, int ano) {
        this.codigo = codigo;
        this.titulo = titulo;
        this.ano = ano;
    }

    public String getCodigo() {
        return codigo;
    }
}
