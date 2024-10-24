# Filtrar tareas urgentes

tareas = [
    {"Tarea": "Enviar informe", "Urgente": True},
    {"Tarea": "Llamar a un cliente", "Urgente": False},
    {"Tarea": "Actualizar el proyecto", "Urgente": True},
    {"Tarea": "Revisar presupuesto", "Urgente": False},
]

def es_urgente(tarea):
    return tarea["Urgente"] == True

urgente = list(filter(es_urgente, tareas))
print("Las tareas urgentes son: ")
for tarea in urgente:
    print(tarea["Tarea"])