# Programa para que reciba una lista de numeros y diga cual es el mayor
def encontrar_maximo(numeros):
    # Empezamos con el máximo en el primer número de la lista
    maximo = numeros[0]
    # Recorremos la lista de los numeros
    for num in numeros:
        if num > maximo:
            maximo = num
    return maximo

print("El numero mas alto de esta lista es: ", encontrar_maximo([3, 5, 2, 9, 1]))  # Debería imprimir 9