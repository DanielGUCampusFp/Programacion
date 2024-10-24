# Filtrar empleados activos

empleados = [
    {"Empleado" : "Daniel", "Estado" : "Inactivo"},
    {"Empleado" : "Raul", "Estado" : "Inactivo"}, 
    {"Empleado" : "Hector", "Estado" : "Inactivo"}, 
    {"Empleado" : "Pepito", "Estado" : "Activo"},
]

def activos(empleado):
    return empleado["Estado"] == "Activo"

empleados_activos = list(filter(activos, empleados))
print("Los empleados actualemente activos son: ")
for empleado in empleados_activos:
    print(empleado["Empleado"])