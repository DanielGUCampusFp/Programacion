import DEF_Conectar

def menu_cliente():
    print("\n=== Gestión de clientes ===")
    print("Seleccione una opción:")
    print("1. Crear nuevo cliente")
    print("2. Leer clientes existentes")
    print("3. Actualizar un cliente")
    print("4. Eliminar un cliente")
    print("5. Salir\n")

def main_cliente():
    while True:
        menu_cliente()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                crear_cliente()
            case 2:
                leer_clientes()
            case 3:
                actualizar_cliente()
            case 4:
                eliminar_cliente()
            case 5:
                finalizar_programa()
            case _:
                print("Introduce un valor correcto")

def crear_cliente():
    try:
        idcliente = input("Ingrese el ID del nuevo cliente: ")
        cia = input("Ingrese el nombre de la compañía: ")
        contacto = input("Ingrese el nombre del contacto: ")
        cargo = input("Ingrese el cargo del contacto: ")
        direccion = input("Ingrese la dirección: ")
        ciudad = input("Ingrese la ciudad: ")
        region = input("Ingrese la región: ")
        cp = input("Ingrese el código postal: ")
        pais = input("Ingrese el país: ")
        tlf = input("Ingrese el teléfono: ")
        fax = input("Ingrese el fax: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("INSERT INTO cliente VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)")
        cursor.execute(consulta, (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax))
        conexion.commit()

        print(f"El cliente '{contacto}' ha sido creado con éxito.")
    except:
        print("ERROR")
       
        
def leer_clientes():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("SELECT * FROM cliente")
        cursor.execute(consulta)
        clientes = cursor.fetchall()

        print("Listado de Categorías:")
        for cliente in clientes:
            print(cliente)

        cursor.close()
        conexion.close()
    except:
        print("No se ha podido mostrar los datos")

def actualizar_cliente():
    try:
        idcliente = input("Ingrese el ID del cliente a actualizar: ")
        contacto = input("Ingrese el nuevo nombre del contacto: ")
        cargo = input("Ingrese el nuevo cargo del contacto: ")
        direccion = input("Ingrese la nueva dirección: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("UPDATE cliente SET contacto = %s, cargo = %s, direccion = %s WHERE idcliente = %s")
        cursor.execute(consulta, (contacto, cargo, direccion, idcliente))
        conexion.commit()

        print(f"El cliente con ID {idcliente} ha sido actualizado.")
    except:
        print("ID cliente no existente")
         
def eliminar_cliente():
    try:
        idcliente = int(input("Ingrese el ID del cliente a eliminar: "))

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("DELETE FROM cliente WHERE idcliente = %s")
        cursor.execute(consulta, (idcliente,))
        conexion.commit()

        print(f"El cliente con ID {idcliente} ha sido eliminado.")
    except:
        print("ID cliente no existente")

def finalizar_programa():
    print("Saliendo de la gestión de clientes. ¡Hasta pronto!")
    return exit()