import DEF_Conectar

def menu_categoria():
    print("\n=== Gestión de Categorías ===")
    print("Seleccione una opción:")
    print("1. Crear nueva categoría")
    print("2. Leer categorías existentes")
    print("3. Actualizar una categoría")
    print("4. Eliminar una categoría")
    print("5. Salir\n")

def main_categoria():
    while True:
        menu_categoria()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                crear_categoria()
            case 2:
                leer_categorias()
            case 3:
                actualizar_categoria()
            case 4:
                eliminar_categoria()
            case 5:
                finalizar_programa()
            case _:
                print("Introduce un valor correcto")

def crear_categoria():
    try:
        print("Ingresa el ID Categoría nuevo que quieres añadir y su nombre.\n")
        ID_categoria = input("Coloca aqui el ID nuevo: ")
        nombre = input("Coloca aqui su nombre: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("INSERT INTO categoria VALUES (%s, %s)")
        cursor.execute(consulta, (ID_categoria, nombre))
        conexion.commit()

        print(f"La categoría {nombre} ha sido creada con éxito.")
    except:
        print("ID Categoria ya existente")
       
        
def leer_categorias():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("SELECT * FROM categoria")
        cursor.execute(consulta)
        categorias = cursor.fetchall()

        print("Listado de Categorías:")
        for categoria in categorias:
            print(categoria)

        cursor.close()
        conexion.close()
    except:
        print("No se ha podido mostrar los datos")

def actualizar_categoria():
    try:
        nombre = input("Ingrese el nuevo nombre de la categoría: ")
        ID_categoria = input("Ingrese el ID de la categoría a actualizar: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("UPDATE categoria SET categoria = %s WHERE idcategoria = %s")
        cursor.execute(consulta, (nombre, ID_categoria))
        conexion.commit()

        print(f"La categoría con ID {ID_categoria} ha sido actualizada a {nombre}.")
    except:
        print("ID Categoria no existente")
        
        
def eliminar_categoria():
    try:
        ID_categoria = input("Ingrese el ID de la categoría a eliminar: ")

        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("DELETE FROM categoria WHERE idcategoria = %s")
        cursor.execute(consulta, (ID_categoria,))
        conexion.commit()

        print(f"La categoría con ID {ID_categoria} ha sido eliminada.")
    except:
            print("ID Categoria no existente")

def finalizar_programa():
    print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
    return exit()