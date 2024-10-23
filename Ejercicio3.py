num = int(input("Introduce un número entero positivo: "))
suma = 0

if num <= 0:
    print("Por favor, introduce un número entero positivo.")
else:
    for N in range(1, num + 1):
        suma += N
print("La suma de es:", suma)