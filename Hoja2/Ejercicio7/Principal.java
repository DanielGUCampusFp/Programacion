class Circunferencia {
	final double PI = 3.1416;
	
	double calcularCircunferencia(double radio) {
		return 2 * PI * radio;
	}
}

public class Principal {
    public static void main(String[] args) {
        Circunferencia circunferencia = new Circunferencia();
        double radio = 5.0;
        double resultado = circunferencia.calcularCircunferencia(radio);
        
        System.out.println("La circunferencia del círculo con radio " + radio + " es: " + resultado);
    }
}
