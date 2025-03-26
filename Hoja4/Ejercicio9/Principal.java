public class Principal {
	public static void main(String[] args) {
        Lavadora lavadora1 = new Lavadora("Samsung", 450.99, 8);
        Televisor televisor1 = new Televisor("LG", 699.99, 55);

        lavadora1.mostrarDatos();
        televisor1.mostrarDatos();
	}
}
