texto = input("Introduce cualquier frase para contar el número de vocales que tiene: ")
vocales = "aeiouAEIOU"
contador = 0

for i in texto:
    if i in vocales:
        contador = contador + 1

print(f"El numero de vocales de tu frase es {contador}")