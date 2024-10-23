numeros = []
mayor = 0
num = input("Ingresa un número (o escribe hecho para terminar): ")

while num != "hecho":
    num = input("Introduce otro numero: ")
    if num != "hecho":
        numeros.append(num)
        for num in numeros:
            if num > numeros[0]:
                mayor = num

print("El numero mayor es", mayor)