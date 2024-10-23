# Defino la funcion de la multiplicacion de cada numero de la lista
def doble(lista_numeros):
    return lista_numeros * 2

# La lista en concreto
lista_numeros = [1, 10, 3, 50, 75]

# Utilizo la funcion map
numeros_dobles = list(map(doble, lista_numeros))
print(numeros_dobles)