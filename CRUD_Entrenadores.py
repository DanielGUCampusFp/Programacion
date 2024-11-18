import DEF_Conectar

def menu_entrenadores():
    print("\n=== Gestión de Entrenadores ===")
    print("1. Crear entrenador")
    print("2. Ver entrenadores")
    print("3. Actualizar entrenador")
    print("4. Eliminar entrenador")
    print("5. Volver\n")

def main_entrenadores():
    while True:
        menu_entrenadores()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                crear_entrenador()
            case 2:
                leer_entrenadores()
            case 3:
                actualizar_entrenador()
            case 4:
                eliminar_entrenador()
            case 5:
                break
            case _:
                print("Introduce un valor correcto")


def crear_entrenador():
    try:
        nombre_entrenador = input("Ingrese el nombre del entrenador: ")
        especialidad = input("Ingrese la especialidad del entrenador: ")
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()
        consulta = "INSERT INTO entrenadores (nombre_entrenador, especialidad) VALUES (%s, %s)" 
        cursor.execute(consulta, (nombre_entrenador, especialidad))
    
        conexion.commit()
        print("Entrenador registrado exitosamente.")
        conexion.close()
    except:
        return print("Entrenador no creado.")

def leer_entrenadores():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        cursor.execute("SELECT * FROM entrenadores")
        entrenadores = cursor.fetchall()
        for entrenador in entrenadores:
            print(entrenador)
        conexion.close()
    except:
        return print("Entrenador no encontrado.")

def actualizar_entrenador():
    try:
        id_entrenador = int(input("Ingrese el ID del entrenador a actualizar: "))
        nombre_entrenador = input("Ingrese el nuevo nombre del entrenador: ")
        especialidad = input("Ingrese la nueva especialidad: ")
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("UPDATE entrenadores SET nombre_entrenador = %s, especialidad = %s WHERE id_entrenador = %s") 
        cursor.execute(consulta, (nombre_entrenador, especialidad, id_entrenador))
    
        conexion.commit()
        print("Entrenador actualizado exitosamente.")
        conexion.close()
    except:
        return print("Entrenador no encontrado.")

def eliminar_entrenador():
    try:
        id_entrenador = int(input("Ingrese el ID del entrenador a eliminar: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        cursor.execute("DELETE FROM actividades WHERE id_entrenador = %s", (id_entrenador,))
        cursor.execute("DELETE FROM entrenadores WHERE id_entrenador = %s", (id_entrenador,))
    
        conexion.commit()
        print("Entrenador y actividades relacionadas eliminadas exitosamente.")
        conexion.close()
    except:
        return print("Entrenador no existente.")