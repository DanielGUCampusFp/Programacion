package Ejercicio3;

public class Principal {

	public static void main(String[] args) {
		CuentaBancaria miCuenta = new CuentaBancaria();
		
		miCuenta.getSaldo();
		miCuenta.depositar(200);
		miCuenta.getSaldo();
		miCuenta.retirar(400);
		miCuenta.getSaldo();
	}

}
