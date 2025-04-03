public class CuentaAhorro extends Cuenta implements Auditable {
	double tasaInteres;
	
	public CuentaAhorro(String numeroCuenta, double saldo, double tasaInteres) {
		super(numeroCuenta, saldo);
		this.tasaInteres = tasaInteres;
	}

	@Override
	public String obtenerDetalles() {
		return "Cuenta de Ahorro - Número: " + numeroCuenta + ", Saldo: " + saldo + ", Tasa de Interés: " + tasaInteres + "%";
	}
}
