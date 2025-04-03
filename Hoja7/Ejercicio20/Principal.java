import java.util.HashMap;

public class Principal {
    public static void main(String[] args) {
        HashMap<String, Cuenta> cuentas = new HashMap<>();

        cuentas.put("001", new CuentaAhorro("001", 5000.0, 1.5));
        cuentas.put("002", new CuentaCorriente("002", 2000.0, 1000.0));
        cuentas.put("003", new CuentaAhorro("003", 10000.0, 2.0));
        cuentas.put("004", new CuentaCorriente("004", 1500.0, 500.0));

        for (Cuenta cuenta : cuentas.values()) {
            System.out.println(((Auditable)cuenta).obtenerDetalles());
        }
    }
}