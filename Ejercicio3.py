i = 0
ciudades = ["Madrid", "Barcelona", "Valencia", "Sevilla"]
print("Estas son las opciones de viaje disponibles: ")
for ciudad in ciudades:
    i = i + 1
    print(f"{i}. {ciudad}")
visitar = int(input("Elige a donde quieres ir: "))
destino = visitar - 1
print(f"Con el numero {visitar}, irás a {ciudades[destino]}")