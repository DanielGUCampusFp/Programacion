import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
	// Utilizo Static para definir estos miembros de una clase para que sean compartidos por todas las instancias
	static Scanner scanner = new Scanner(System.in);
	static ArrayList<Animal> animales = new ArrayList<>();

	public static void main(String[] args) {
		// Dos animales de Prueba
		animales.add(new Perro(1, "Max", 8, "Labrador", true, "mediano"));
		animales.add(new Gato(2, "Misifu", 9, "Egipcio", false, false));
		
		   // Bucle do while para que se muestre inicialmente el menu y hasta que no se pulse el numero 3 no se sale del bucle
	       int opcion;
	       do {
	           System.out.println("\n--- SISTEMA DE ALTA DE ANIMALES ---");
	           System.out.println("1. Añadir animal");
	           System.out.println("2. Buscar animal por numero de chip");
	           System.out.println("3. Salir");
	           System.out.print("Selecciona una opción: ");
	           opcion = scanner.nextInt();
	           scanner.nextLine();
	           switch (opcion) {
	               case 1: añadirAnimal(); 
	               break;
	               case 2: buscarAnimal(); 
	               break;
	               case 3: System.out.println("¡Hasta pronto!"); 
	               break;
	               default: System.out.println("Opción no válida");
	           }
	       } while (opcion != 3);
	}
	       // Metodo para añadir animales, donde te pregunta si vas a añadir un perro o un gato y depende cual elijas te hara unas preguntas con el atributo especial añadido antes
	       public static void añadirAnimal() {
	           System.out.print("¿Perro o Gato? ");
	           String tipo = scanner.nextLine().toUpperCase().intern();
	          
	           System.out.print("Introduce el numero de su Chip: ");
	           int numChip = scanner.nextInt();
	          
	           for (Animal animal : animales) {
	               if (animal.numChip == numChip) {
	                   System.out.println("Ya existe un animal con ese numero de chip. No se ha añadido.");
	                   return;
	               }
	           }
	           System.out.print("Introduce el nombre del Animal: ");
	           String nombre = scanner.nextLine();
	           scanner.nextLine();
	           
	           System.out.print("Introduce la edad del Animal: ");
	           int edad = scanner.nextInt();
	           scanner.nextLine();
	           
	           // Si escribes perro da igual si lo escribes con minuscula o no al tener el toUpperCase() lo convertira a mayuscula todo y se ajustara a lo que pide el if
	           if (tipo == "PERRO") {
	               System.out.print("Introduce la raza del Perro: ");
	               String raza = scanner.nextLine();
	               System.out.print("¿Es adoptado? (si/no): ");
	               String respuesta = scanner.nextLine().intern();
	               boolean adoptado = respuesta == "si";
	               System.out.print("Introduce el tamaño del Perro: (pequeño, mediano o grande) ");
	               String tamano = scanner.nextLine();
	               
	               // Con los datos ya escritos se almacenaran en el ArrayList gracias al add
	               animales.add(new Perro(numChip, nombre, edad, raza, adoptado, tamano));
	               
		       // Si escribes perro da igual si lo escribes con minuscula o no al tener el toUpperCase() lo convertira a mayuscula todo y se ajustara a lo que pide el if
	           } else if (tipo == "GATO") {
	               System.out.print("Introduce la raza del Gato: ");
	               String raza = scanner.nextLine();
	               System.out.print("¿Es adoptado? (si/no): ");
	               String respuesta = scanner.nextLine().intern();
	               boolean adoptado = respuesta == "si";
	               System.out.print("¿El Gato tiene leucemia? (si/no): ");
	               String respuesta2 = scanner.nextLine().intern();
	               boolean leucemia = respuesta2 == "si";
	               
	               // Con los datos ya escritos se almacenaran en el ArrayList gracias al add
	               animales.add(new Gato(numChip, nombre, edad, raza, adoptado, leucemia));
	           }
	           System.out.println("¡Animal añadido correctamente!");
	       }
	       
	       // Metodo para buscar el animal gracias a su numero de chip
	       public static void buscarAnimal() {
	           System.out.print("Introduce el numero de Chip para buscarlo: ");
	           int numChip = scanner.nextInt();
	          
	           // Si el numero de chip puesto es igual a uno existente te mostrara los datos de ese animal
	           for (Animal animal : animales) {
	        	    if (animal.numChip == numChip) {
	        	        animal.mostrar();
	        	        return;
	        	    }
	        	}
	           	// Si no te dira que no se ha encontrado a ninguno
	        	System.out.println("No se ha encontrado a ningún animal con ese número de Chip.");
	       }
}




