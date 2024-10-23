# Ejercicio que cuenta vocales y devuelve su numero(a, e, i, o, u)
def contar_vocales(cadena):
    # Añadimos las vocales que hay
    vocales = "aeiouAEIOU"
    contador = 0
    # Recorremos todas las letras en busca de aeiouAEIOU
    for letras in cadena:
        # Si es vocal añadimos uno al contador
        if letras in vocales:
            contador = contador + 1
    return contador

print("Esta frase tiene", contar_vocales("Hola Mundo"), "vocales")  # Debería imprimir 4