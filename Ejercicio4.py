# Defino la funcion de redondear todos los numeros de la lista
def redondear(lista_numeros):
    return round(lista_numeros)

# La lista en concreto
lista_numeros = [1.6, 10.5, 3.23, 50.51, 75.98]

# Utilizo la funcion map
numeros_redondeados = list(map(redondear, lista_numeros))
print(numeros_redondeados)