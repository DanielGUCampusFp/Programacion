import DEF_Conectar

def menu_producto():
    print("\n=== Gestión de Productos ===")
    print("Seleccione una opción:")
    print("1. Crear nuevo producto")
    print("2. Leer productos existentes")
    print("3. Actualizar un producto")
    print("4. Eliminar un producto")
    print("5. Salir\n")

def main_producto():
    while True:
        menu_producto()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                crear_producto()
            case 2:
                leer_productos()
            case 3:
                actualizar_producto()
            case 4:
                eliminar_producto()
            case 5:
                finalizar_programa()
            case _:
                print("Introduce un valor correcto")

def crear_producto():
    try:
        print("Ingresa los datos siguientes para completar el añado del nuevo producto: \n")
        idproducto = int(input("Ingrese el ID del nuevo producto: "))
        nombre = input("Ingrese el nombre del producto: ")
        idcategoria = int(input("Ingrese el ID de la categoría del producto: "))
        medida = input("Ingrese la medida del producto: ")
        precio = float(input("Ingrese el precio del producto: "))
        stock = int(input("Ingrese el stock del producto: "))

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("INSERT INTO producto VALUES (%s, %s, %s, %s, %s, %s)")
        cursor.execute(consulta, (idproducto, nombre, idcategoria, medida, precio, stock))
        conexion.commit()

        print(f"El producto '{nombre}' ha sido creado con éxito.")
    except:
        print("ERROR")
       
        
def leer_productos():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("SELECT * FROM producto")
        cursor.execute(consulta)
        productos = cursor.fetchall()

        print("Listado de Categorías:")
        i = 0
        for producto in productos:
            print(producto)

        cursor.close()
        conexion.close()
    except:
        print("No se ha podido mostrar los datos")

def actualizar_producto():
    try:
        idproducto = int(input("Ingrese el ID del producto a actualizar: "))
        nombre = input("Ingrese el nuevo nombre del producto: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("UPDATE producto SET nombre = %s WHERE idproducto = %s")
        cursor.execute(consulta, (nombre, idproducto))
        conexion.commit()

        print(f"El producto con ID {idproducto} ha sido actualizado a '{nombre}'.")
    except:
        print("ID producto no existente")
        
        
def eliminar_producto():
    try:
        idproducto = int(input("Ingrese el ID del producto a eliminar: "))

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("DELETE FROM producto WHERE idproducto = %s")
        cursor.execute(consulta, (idproducto,))
        conexion.commit()

        print(f"La categoría con ID {idproducto} ha sido eliminada.")
    except:
        print("ID producto no existente")

def finalizar_programa():
    print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
    return exit()

def finalizar_programa():
    print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
    return exit()