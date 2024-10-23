# Programa que cuente los numeros pares de una lista
def contar_pares(numeros):
    # Añadimos un contador en cero
    contador = 0
    # Recorremos sobre cada número en la lista
    for num in numeros:
        # Si el número es par, incrementamos el contador
        if num % 2 == 0:
            contador = contador + 1
    # Devolvemos el total de números pares
    return contador


print("La cantidad de numeros pares de esta lista es: ", contar_pares([1, 2, 3, 4, 5, 6]))  # Debería imprimir 3 numeros