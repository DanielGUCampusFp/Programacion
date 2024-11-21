import CRUD_Cliente, CRUD_Pedido

def menu_principal():
    while True:
        print("\n=== Gestión de Tienda Online ===")
        print("Seleccione una opción:")
        print("1. Apartado Clientes")
        print("2. Apartado Pedidos")
        print("3. Salir\n")
        opcion_tabla = int(input("Opción: "))
        match opcion_tabla:
            case 1:
                CRUD_Cliente.main_cliente()
            case 2:
                CRUD_Pedido.main_pedido()
            case 3:
                print("Gracias por usar el programa.")
                break
            case _:
                print("Opción inválida, intentelo nuevamente.")

menu_principal()