import DEF_Conectar

def menu_inscripciones():
    print("\n=== Gestión de Inscripciones ===")
    print("1. Registrar inscripción")
    print("2. Ver inscripciones")
    print("3. Eliminar inscripción")
    print("4. Volver\n")

def main_inscripciones():
    while True:
        menu_inscripciones()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                registrar_inscripcion()
            case 2:
                ver_inscripciones()
            case 3:
                eliminar_inscripcion()
            case 4:
                break
            case _:
                print("Introduce un valor correcto")

def registrar_inscripcion():
    try:
        id_cliente = int(input("Ingrese el ID del cliente: "))
        id_actividad = int(input("Ingrese el ID de la actividad: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        consulta = ("INSERT INTO inscripciones (id_cliente, id_actividad) VALUES (%s, %s)") 
        cursor.execute(consulta, (id_cliente, id_actividad))

        conexion.commit()
        print("Inscripción registrada exitosamente.")
        conexion.close()
    except:
        return print("Inscripcion no registrada.")

def ver_inscripciones():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()
    
        cursor.execute("SELECT i.id_inscripcion, c.nombre, a.nombre_actividad, a.horario FROM inscripciones i JOIN clientes c ON i.id_cliente = c.id_cliente JOIN actividades a ON i.id_actividad = a.id_actividad")
        inscripciones = cursor.fetchall()

        print("ID Inscripción | Cliente       | Actividad   | Horario")
        print("------------------------------------------------------")
        for inscripcion in inscripciones:
            print(f"{inscripcion[0]}              | {inscripcion[1]} | {inscripcion[2]} | {inscripcion[3]}")
        conexion.close()
    except:
        return print("ERROR")

def eliminar_inscripcion():
    try:
        id_inscripcion = int(input("Ingrese el ID de la inscripción a eliminar: "))
    
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()
    
        cursor.execute("DELETE FROM inscripciones WHERE id_inscripcion = %s", (id_inscripcion,))

        conexion.commit()
        print("Inscripción eliminada exitosamente.")
        conexion.close()
    except:
        return print("Inscripción no existente, no se puede borrar.")