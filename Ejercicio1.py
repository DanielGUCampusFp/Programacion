'''texto = str(input("Introduce un texto: "))
palabras = texto.split()

for palabra in palabras:
    print("Tu texto invertido es: ", palabra[::-1], end = ' ')'''

palabra = ""
palabra = str(input("Introduce una palabra: "))
palabra_invertida = ""
for i in palabra:
    palabra_invertida = i + palabra_invertida
print("La palabra invertida es:", palabra_invertida)
