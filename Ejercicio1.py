# Defino la funcion de la suma de todos los numeros de la lista
def suma_5(lista_numeros):
    return lista_numeros + 5

# La lista en concreto
lista_numeros = [1, 10, 3, 50, 75]

# Utilizo la funcion map
numeros_aumentados = list(map(suma_5, lista_numeros))
print(numeros_aumentados)