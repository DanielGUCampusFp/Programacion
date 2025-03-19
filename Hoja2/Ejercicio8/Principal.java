class Conversor {	
	int convertirDoubleAInt(double numero) {
		return (int) numero;
	}
}

public class Principal {
    public static void main(String[] args) {
        Conversor conversor = new Conversor();
        double numeroDecimal = 7.89;
        int numeroEntero = conversor.convertirDoubleAInt(numeroDecimal);
        
        System.out.println("El número decimal " + numeroDecimal + " convertido a entero es: " + numeroEntero);
    }
}

