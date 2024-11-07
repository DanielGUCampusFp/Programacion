import DEF_Menu, DEF_Menu2

def menu_principal():
    while True:
        print("\n=== Gestión de Supermercado ===")
        print("Seleccione una tabla para operar:")
        print("1. Categorías")
        print("2. Productos")
        print("3. Salir\n")
        opcion_tabla = int(input("Opción: "))
        match opcion_tabla:
            case 1:
                DEF_Menu.main_categoria()
            case 2:
                DEF_Menu2.main_producto()
            case 3:
                print("Saliendo de la gestión de supermercado. ¡Hasta pronto!")
                break
            case _:
                print("Opción inválida, intente nuevamente.")

menu_principal()