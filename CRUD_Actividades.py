import DEF_Conectar

def menu_actividades():
    print("\n=== Gestión de Actividades ===")
    print("1. Crear actividad")
    print("2. Ver actividades")
    print("3. Actualizar actividad")
    print("4. Eliminar actividad")
    print("5. Volver\n")

def main_actividades():
    while True:
        menu_actividades()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                crear_actividad()
            case 2:
                leer_actividades()
            case 3:
                actualizar_actividad()
            case 4:
                eliminar_actividad()
            case 5:
                break
            case _:
                print("Introduce un valor correcto")

def crear_actividad():
    try:
        nombre_actividad = input("Ingrese el nombre de la actividad: ")
        horario = input("Ingrese el horario de la actividad: ")
        duracion = int(input("Ingrese la duración (minutos): "))
        id_entrenador = int(input("Ingrese el ID del entrenador: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = "INSERT INTO actividades (nombre_actividad, horario, duracion, id_entrenador) VALUES (%s, %s, %s, %s)" 
        cursor.execute(consulta, (nombre_actividad, horario, duracion, id_entrenador))
    
        conexion.commit()
        print("Actividad registrada exitosamente.")
        conexion.close()
    except:
        return print("Actividad no registrada.")

def leer_actividades():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        cursor.execute("SELECT a.id_actividad, a.nombre_actividad, a.horario, a.duracion, e.nombre_entrenador FROM actividades a JOIN entrenadores e ON a.id_entrenador = e.id_entrenador")
    
        actividades = cursor.fetchall()
        for actividad in actividades:
            print(actividad)
        conexion.close()
    except:
        return print("Actividad no encontra/no existente.")

def actualizar_actividad():
    try:
        id_actividad = int(input("Ingrese el ID de la actividad a actualizar: "))
        nombre_actividad = input("Ingrese el nuevo nombre de la actividad: ")
        horario = input("Ingrese el nuevo horario: ")
        duracion = int(input("Ingrese la nueva duración (minutos): "))
        id_entrenador = int(input("Ingrese el nuevo ID del entrenador: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()
    
        consulta = ("UPDATE actividades SET nombre_actividad = %s, horario = %s, duracion = %s, id_entrenador = %s WHERE id_actividad = %s")
        cursor.execute(consulta, (nombre_actividad, horario, duracion, id_entrenador, id_actividad))
    
        conexion.commit()
        print("Actividad actualizada exitosamente.")
        conexion.close()
    except:
        return print("Actividad no actualizada por no haberse encontrada.")

def eliminar_actividad():
    try:
        id_actividad = int(input("Ingrese el ID de la actividad a eliminar: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        cursor.execute("DELETE FROM inscripciones WHERE id_actividad = %s", (id_actividad,))
        cursor.execute("DELETE FROM actividades WHERE id_actividad = %s", (id_actividad,))

        conexion.commit()
        print("Actividad y sus inscripciones eliminadas exitosamente.")
        conexion.close()
    except:
        return print("Actividad no eliminada.")