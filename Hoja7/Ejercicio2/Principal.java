public class Principal {
    public static void main(String[] args) {
        String[] nombres = {"Raul", "Daniel", "Hector"};

        System.out.println("Nombres en orden inverso:");
        for (int i = nombres.length - 1; i >= 0; i--) {
            System.out.println(nombres[i]);
        }
    }
}
