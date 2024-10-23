# Defino la funcion de la lista de palabras para contar sus letras con la funcion len
def frases(lista_palabras):
    return len(lista_palabras)

# La lista en concreto
lista_frases = ["hola", "buenas", "chicos"]

# Utilizo la funcion map
longitud_palabras = list(map(frases, lista_frases))
print(longitud_palabras)