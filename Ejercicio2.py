# Filtrar vehículos con revisión pasada
vehiculos = [
    {"Modelo" : "Audi", "Estado" : "Aprobada"},
    {"Modelo" : "Mercedes", "Estado" : "Pendiente"}, 
    {"Modelo" : "BMW", "Estado" : "Pendiente"}, 
    {"Modelo" : "Bugati", "Estado" : "Aprobada"},
]

def aprobados(vehiculo):
    return vehiculo["Estado"] == "Aprobada"

vehiculos_aprobados = list(filter(aprobados, vehiculos))
print("Los vehiculos con la revision aprobada son: ")
for vehiculo in vehiculos_aprobados:
    print(vehiculo)