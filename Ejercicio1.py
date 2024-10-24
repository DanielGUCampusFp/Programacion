# Filtrar productos perecederos
productos = [
    {"Producto": "Zumo", "Perecedero": True},
    {"Producto": "Cereales", "Perecedero": False},
    {"Producto": "Verduras", "Perecedero": True},
    {"Producto": "Miel", "Perecedero": False},
]

def es_perecedero(producto):
    return producto["Perecedero"] == True

perecedero = list(filter(es_perecedero, productos))
print("Los productos perecederos de la lista son: ")
for producto in perecedero:
    print(producto["Producto"])