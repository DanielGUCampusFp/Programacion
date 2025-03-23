class Verificador {
	boolean esMayorPar(int numero) {
		if (numero > 10 && numero % 2 == 0) {
			return true;
		} else {
			return false;
		}
	}
}

public class Principal {
    public static void main(String[] args) {
        Verificador verificador = new Verificador();
        boolean resultado = verificador.esMayorPar(8);
	if (resultado) {
		System.out.println("El numero es par y mayor que 10");
	} else {
		System.out.println("El numero no es par ni mayor que 10");
        }
    }
}