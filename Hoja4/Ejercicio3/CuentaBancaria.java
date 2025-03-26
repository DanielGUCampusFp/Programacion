package Ejercicio3;

public class CuentaBancaria {
	private double saldo;

	public void getSaldo() {
		System.out.println("El saldo actual de la cuenta es de: " + saldo + " euros.");
	}
	void depositar(double cantidad) {
		saldo = saldo + cantidad;
		System.out.println("Has depositado " + cantidad + " euros.");
	}
	void retirar(double cantidad) {
		saldo = saldo - cantidad;
		System.out.println("Has retirado " + cantidad + " euros.");
	}
	
}
