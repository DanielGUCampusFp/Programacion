import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Principal {
	private static ArrayList<Libro> biblioteca = new ArrayList<>();
	private static Scanner scanner = new Scanner(System.in);
    
	public static void main(String[] args) {
		cargarBiblioteca();
		// Libros guardados ya en biblioteca.ser
	    Libro libro1 = new Libro("El Código Da Vinci", "Dan Brown", "0-385-50420-9", 2003);
	    Libro libro2 = new Libro("1984", "George Orwell", "9788499890944", 1949);
		while (true) {
            System.out.println("\n--- Gestión de Biblioteca ---");
            System.out.println("1. Añadir un nuevo libro");
            System.out.println("2. Mostrar todos los libros");
            System.out.println("3. Buscar un libro por título o autor");
            System.out.println("4. Salir");
            System.out.print("Seleccione una opción: ");

            try {
                int opcion = Integer.parseInt(scanner.nextLine());
                switch (opcion) {
                    case 1:
                        registrarLibro();
                        break;
                    case 2:
                        mostrarLibros();
                        break;
                    case 3:
                        buscarLibro();
                        break;
                    case 4:
                        guardarBiblioteca();
                        scanner.close();
                        System.out.println("¡Programa finalizado!");
                        return;
                    default:
                        System.out.println("Opción no válida.");
                }
            } catch (NumberFormatException e) {
                System.out.println("Error: Ingrese un número válido.");
            }
        }
    }
		
		private static void guardarBiblioteca() {
	        try (ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream("biblioteca.ser"))) {
	        	out.writeObject(biblioteca);
	            System.out.println("Biblioteca guardada en " + "biblioteca.ser");
	        } catch (IOException e) {
	            System.out.println("Error al guardar la biblioteca: " + e.getMessage());
	        }
	    }
	
		private static void cargarBiblioteca() {
		    try (ObjectInputStream in = new ObjectInputStream(new FileInputStream("biblioteca.ser"))) {
		        biblioteca = (ArrayList<Libro>) in.readObject();
		        System.out.println("Biblioteca cargada desde biblioteca.ser");
		    } catch (IOException | ClassNotFoundException e) {
		        System.out.println("No se pudo cargar la biblioteca: " + e.getMessage());
		    }
		}
		
		private static void registrarLibro() {
		    try {
		        System.out.print("Introduce el titulo del libro: ");
		        String titulo = scanner.nextLine();
		        System.out.print("Introduce el autor del libro: ");
		        String autor = scanner.nextLine();
		        System.out.print("Introduce el ISBN del libro: ");
		        String isbn = scanner.nextLine();
		        
		        for (Libro libro : biblioteca) {
		            if (libro.isbn.equals(isbn)) {
		                System.out.println("Error: El ISBN ya existe.");
		                return;
		            }
		        }
		        
		        System.out.print("Introduce el año de publicacion del libro: ");
		        int anoPublicacion = scanner.nextInt();
		        scanner.nextLine();
		        
		        biblioteca.add(new Libro(titulo, autor, isbn, anoPublicacion));
		        guardarBiblioteca();
		        System.out.println("Libro añadido correctamente.");
		        
		    } catch (InputMismatchException e) {
		        System.out.println("Error: El año debe ser un número.");
		        scanner.nextLine();
		    }
		}
		
		private static void mostrarLibros() {
		    if (biblioteca.isEmpty()) {
		        System.out.println("No hay libros.");
		    } else {
		        System.out.println("\nLista de libros:");
		        for (int i = 0; i < biblioteca.size(); i++) {
		            System.out.println((i + 1) + ". " + biblioteca.get(i));
		        }
		    }
	   }
		
		private static void buscarLibro() {
	        System.out.print("Ingrese título o autor: ");
	        String busqueda = scanner.nextLine().toLowerCase();
	        boolean encontrado = false;

	        System.out.println("\n--- Resultados ---");
	        for (Libro libro : biblioteca) {
	            if (libro.titulo.toLowerCase().contains(busqueda) || libro.autor.toLowerCase().contains(busqueda)) {
	                System.out.println(libro);
	                encontrado = true;
	            }
	        }

	        if (!encontrado) {
	            System.out.println("No se encontraron libros.");
	        }
	    }
}
