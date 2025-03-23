class Operaciones {
    int num1 = 5;
    int num2 = 10;
    int resultado = 0;

    public void sumar() {
        resultado = num1 + num2;
        System.out.println("Suma: " + resultado);
    }

    public void restar() {
        resultado = num1 - num2;
        System.out.println("Resta: " + resultado);
    }

    public void multiplicar() {
        resultado = num1 * num2;
        System.out.println("Multiplicación: " + resultado);
    }

    public void dividir() {
            resultado = num1 / num2;
            System.out.println("División: " + resultado);
    }
}


public class Principal {
	public static void main(String[] args) {
        	Operaciones operaciones = new Operaciones();
        	operaciones.sumar();
        	operaciones.restar();
        	operaciones.multiplicar();
        	operaciones.dividir();
    	}
}