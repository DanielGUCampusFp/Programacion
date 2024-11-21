import DEF_Conectar

def menu_cliente():
    print("\n=== Gestión de Clientes ===")
    print("1. Registrar Cliente")
    print("2. Ver Clientes")
    print("3. Buscar Cliente")
    print("4. Volver\n")

def main_cliente():
    while True:
        menu_cliente()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                registrar_cliente()
            case 2:
                ver_clientes()
            case 3:
                buscar_cliente()
            case 4:
                break
            case _:
                print("Introduce un valor correcto")

def registrar_cliente():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()


        print("Registro de Cliente")
        nombre = input("Introduce tu nombre completo: ")
        email = input("Introduce tu email: ")
        direccion = input("Introduce tu dirección: ")
        telefono = input("Introduce tu teléfono: ")
    
        # Inserta los datos del cliente en la base de datos
        consulta = ("INSERT INTO clientes (nombre, email, direccion, telefono) VALUES (%s, %s, %s, %s)")
        cursor.execute(consulta, (nombre, email, direccion, telefono))

        conexion.commit()
        print(f"Cliente {nombre} registrado con éxito!")
        conexion.close()
    except:
        print("Cliente no registrado")
    
def ver_clientes():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        # Seleccionar que muestre los datos de los clientes
        print("Clientes Registrados:")
        cursor.execute("SELECT cliente_id, nombre, email, direccion, telefono FROM clientes")
        clientes = cursor.fetchall()

        # Bucle for para mostrar los detalles de los clientes
        for cliente in clientes:
            print(f"ID: {cliente[0]}, Nombre: {cliente[1]}, Email: {cliente[2]}, Dirección: {cliente[3]}, Teléfono: {cliente[4]}")
        
        # Cerramos la conexion
        cursor.close()
        conexion.close()
    except:
        print("No ha sido posible mostrar los clientes.")


def buscar_cliente():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        email = input("Introduce el email del cliente que deseas buscar: ")

        # Realizamos la consulta para buscar el cliente por email
        cursor.execute("SELECT cliente_id, nombre, email, direccion, telefono FROM clientes WHERE email = %s", (email,))
        cliente = cursor.fetchone() # Para mostrar solo la primera fila
        
        # Si el cliente introducido no existe te avisara
        if not cliente:
            print(f"No se ha encontrado ningún cliente con el email {email}.")
        else:
            print(f"Detalles del cliente encontrado:")
            print(f"ID: {cliente[0]}")
            print(f"Nombre: {cliente[1]}")
            print(f"Email: {cliente[2]}")
            print(f"Dirección: {cliente[3]}")
            print(f"Teléfono: {cliente[4]}")
    
        cursor.close()
        conexion.close()
    except:
        print("Cliente no encontrado.")
