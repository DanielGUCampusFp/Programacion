import DEF_Conectar

def menu_cliente():
    print("\n=== Gestión de Clientes ===")
    print("1. Crear cliente")
    print("2. Ver clientes")
    print("3. Actualizar cliente")
    print("4. Eliminar cliente")
    print("5. Volver\n")

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
                break
            case _:
                print("Introduce un valor correcto")

def crear_cliente():
    try:
        nombre = input("Ingrese el nombre del cliente: ")
        edad = int(input("Ingrese la edad: "))
        tipo_membresia = input("Ingrese el tipo de membresía: ")
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("INSERT INTO clientes (nombre, edad, tipo_membresia) VALUES (%s, %s, %s)")
        cursor.execute(consulta, (nombre, edad, tipo_membresia))
    
        conexion.commit()
        print("Cliente registrado exitosamente.")
        conexion.close()
    except:
        return print("Cliente no creado.")

def leer_clientes():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        cursor.execute("SELECT * FROM clientes")
        clientes = cursor.fetchall()
        for cliente in clientes:
            print(cliente)
        
        conexion.close()
    except:
        return print("Cliente no existente.")

def actualizar_cliente():
    try:
        id_cliente = int(input("Ingrese el ID del cliente a actualizar: "))
        nombre = input("Ingrese el nuevo nombre del cliente: ")
        edad = int(input("Ingrese la nueva edad: "))
        tipo_membresia = input("Ingrese el nuevo tipo de membresía: ")
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("UPDATE clientes SET nombre = %s, edad = %s, tipo_membresia = %s WHERE id_cliente = %s")
        cursor.execute(consulta, (nombre, edad, tipo_membresia, id_cliente))

        conexion.commit()
        print("Cliente actualizado exitosamente.")
        conexion.close()
    except:
        return print("Cliente no actualizado.")

def eliminar_cliente():
    try:
        id_cliente = int(input("Ingrese el ID del cliente a eliminar: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()
    
        cursor.execute("DELETE FROM inscripciones WHERE id_cliente = %s", (id_cliente,))
        cursor.execute("DELETE FROM clientes WHERE id_cliente = %s", (id_cliente,))
    
        conexion.commit()
        print("Cliente y sus inscripciones eliminadas exitosamente.")
        conexion.close()
    except:
        return print("Cliente no encontrado.")