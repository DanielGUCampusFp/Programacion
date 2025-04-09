import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
	// Utilizo Static para definir estos miembros de una clase para que sean compartidos por todas las instancias
	static Scanner scanner = new Scanner(System.in);
	static ArrayList<Animal> animales = new ArrayList<>();

	public static void main(String[] args) {
		// Tres animales de Prueba
		animales.add(new Perro(1, "Max", 8, "Labrador", true, "mediano"));
		animales.add(new Gato(2, "Misifu", 9, "Egipcio", false, false));
		animales.add(new Gato(3, "Garfield", 6, "Naranja", false, true));
		
		   // Bucle do while para que se muestre inicialmente el menu y hasta que no se pulse el numero 3 no se sale del bucle
	       int opcion;
	       do {
	           System.out.println("\n--- SISTEMA DE ALTA DE ANIMALES ---");
	           System.out.println("1. Añadir animal");
	           System.out.println("2. Mostrar todos los animales");
	           System.out.println("3. Buscar animal por numero de chip");
	           System.out.println("4. Realizar Adopción");
	           System.out.println("5. Dar de Baja a un Animal");
	           System.out.println("6. Mostrar Estadisticas de los Gatos");
	           System.out.println("7. Salir");
	           System.out.print("Selecciona una opción: ");
	           opcion = scanner.nextInt();
	           scanner.nextLine();
	           switch (opcion) {
	               case 1: añadirAnimal(); 
	               break;
	               case 2: mostrarAnimales(); 
	               break;
	               case 3: buscarAnimal(); 
	               break;
	               case 4: adoptarAnimal(); 
	               break;
	               case 5: eliminarAnimal(); 
	               break;
	               case 6: estadisticasGatos(); 
	               break;
	               case 7: System.out.println("¡Hasta pronto!"); 
	               break;
	               default: System.out.println("Opción no válida");
	           }
	       } while (opcion != 7);
	}
	       // Metodo para añadir animales, donde te pregunta si vas a añadir un perro o un gato y depende cual elijas te hara unas preguntas con el atributo especial añadido antes
	       public static void añadirAnimal() {
	           System.out.print("¿Perro o Gato? ");
	           String tipo = scanner.nextLine().toUpperCase().intern();
	          
	           System.out.print("Introduce el numero de su Chip: ");
	           int numChip = scanner.nextInt();
	           scanner.nextLine();
	          
	           for (Animal animal : animales) {
	               if (animal.numChip == numChip) {
	                   System.out.println("Ya existe un animal con ese numero de chip. No se ha añadido.");
	                   return;
	               }
	           }
	           System.out.print("Introduce el nombre del Animal: ");
	           String nombre = scanner.nextLine();
	           
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
	       
	       // Metodo para eliminar al animal de la lista segun su numero de chip
	       public static void eliminarAnimal() {
	    	    System.out.print("Introduce el número de Chip para eliminar a ese animal: ");
	    	    int numChip = scanner.nextInt();
	    	    scanner.nextLine();

	    	    // Bucle for para sacar la posicion del Arraylist del numero de chip del animal especifico
	    	    for (int i = 0; i < animales.size(); i++) {
	    	        Animal animal = animales.get(i);
	    	        if (animal.numChip == numChip) {
	    	            // Determinar el tipo de animal y su nombre
	    	            String tipoAnimal = animal.getTipo();
	    	            String nombreAnimal = animal.nombre;

	    	            // Mensaje de confirmacion
	    	            System.out.print("¿Seguro que quieres borrar al " + tipoAnimal + " de nombre " + nombreAnimal + "? (sí/no): ");
	    	            String confirmacion = scanner.nextLine().toLowerCase().intern();

	    	            if (confirmacion == ("sí") || confirmacion == ("si")) { 
	    	                animales.remove(i);
	    	                System.out.println("Animal eliminado correctamente.");
	    	            } else {
	    	                System.out.println("Eliminación cancelada.");
	    	            }
	    	            return;
	    	        }
	    	    }
	    	    System.out.println("No se ha encontrado a ningún animal con ese número de Chip.");
	    	}
	       
	       // Metodo para mostrar o listar a todos los animales
	       public static void mostrarAnimales() {
	           for (Animal animal : animales) {
	               animal.mostrar();
	           }
	       }
	       
	       // Metodo par adoptar un animal segun el chip que introduzcas y que si su atributo boolean adoptado es true de error porque ya esta adoptado y si no que lo adopte
	       public static void adoptarAnimal() {
	    	    System.out.print("Ingrese el número de chip del animal a adoptar: ");
	    	    int numChip = scanner.nextInt();
	    	    scanner.nextLine();

	    	    // Datos de la clase Persona
	    	    System.out.print("Ingrese tu nombre: ");
	    	    String nombre = scanner.nextLine();

	    	    System.out.print("Ingresa tu DNI: ");
	    	    String DNI = scanner.nextLine();
	    	    
	    	    System.out.print("Ingresa tu telefono: ");
	    	    int telefono = scanner.nextInt();

	    	    // Añade segun los datos puestos antes y crea un nuevo objeto de la clase Persona con la variable adoptador
	    	    Persona adoptador = new Persona(nombre, DNI, telefono);

	    	    for (Animal animal : animales) {
	    	        if (animal.numChip == numChip) {
	    	            if (animal.adoptado) {
	    	                System.out.println("Lo sentimos, el animal con número de chip " + numChip + " ya está adoptado.");
	    	            } else {
	    	                animal.adoptado = true;
	    	                System.out.println("Adopción realizada con éxito. " + adoptador.nombre + 
	    	                                  " (DNI: " + adoptador.DNI + ", Telefono: " + telefono + ") ha adoptado al animal con chip " + 
	    	                                  numChip + ". ¡Gracias por adoptar!");
	    	            }
	    	            return;
	    	        }
	    	    }
	    	    System.out.println("Lo sentimos, el animal con número de chip " + numChip + " no existe.");
	    	}
	       
	       // Metodo para mostrar cuantos gatos hay y cuantos tienen leucemia
	       public static void estadisticasGatos() {
	    	   int totalGatos = 0;
	           int gatosConLeucemia = 0;

	           for (Animal animal : animales) {
	        	   // Si son del tipo de animal un gato que se añada al contador
	               if (animal.getTipo() == "Gato") {
	                   totalGatos++;
	               // Si el boolean de lecuemia es true lo añade al contador
	                   if (((Gato) animal).leucemia == true) {
	                       gatosConLeucemia++;
	                   }
	               }
	           }
	           // Print del resultado
	           System.out.println("-- Estadísticas de gatos --");
	           System.out.println("Número total de gatos: " + totalGatos);
	           System.out.println("Número de gatos con leucemia: " + gatosConLeucemia);
	       }
}





