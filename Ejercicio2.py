# Defino la funcion de las frases en la lista de las frases con la funcion title para convertir la primera letra de cada palabra de la frase en mayuscula
def frases(lista_frases):
    return lista_frases.title()

# La lista en concreto
lista_frases = ["hola chicos, que tal estais"]

# Utilizo la funcion map
frases_mayuscula = list(map(frases, lista_frases))
print(frases_mayuscula)