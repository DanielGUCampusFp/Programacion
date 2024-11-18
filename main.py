import CRUD_Entrenadores, CRUD_Inscripciones, CRUD_Clientes, CRUD_Actividades

def menu_principal():
    while True:
        print("\n=== Gestión del Centro Deportivo ===")
        print("Seleccione una opción:")
        print("1. Gestión de Clientes")
        print("2. Gestión de Actividades")
        print("3. Gestión de Entrenadores")
        print("4. Gestión de Inscripciones")
        print("5. Salir\n")
        opcion_tabla = int(input("Opción: "))
        match opcion_tabla:
            case 1:
                CRUD_Clientes.main_cliente()
            case 2:
                CRUD_Actividades.main_actividades()
            case 3:
                CRUD_Entrenadores.main_entrenadores()
            case 4:
                CRUD_Inscripciones.main_inscripciones()
            case 5:
                print("Saliendo del Centro Deportivo. ¡Hasta pronto!")
                break
            case _:
                print("Opción inválida, intente nuevamente.")

menu_principal()