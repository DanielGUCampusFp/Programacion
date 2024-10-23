# Ejercicio que recibe un numero entero positivo y lo suma entre ellos
def suma_hasta_limite(limite):
    suma = 0
    # Recorremos desde el 1 hasta el introducido pero tambien contando con el
    for num in range(1, limite + 1):
        suma = suma + num
    return suma

print(suma_hasta_limite(5))  # Debería imprimir 15 (1 + 2 + 3 + 4 + 5)