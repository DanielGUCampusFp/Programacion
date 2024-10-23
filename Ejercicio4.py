notas = {}
contador = 0
suma = 0
asignatura = input("Introduce el nombre de la asignatura: ")
nota = float(input("Introduce la nota correspondiente a la asignatura: "))

while asignatura != "fin":
    notas[asignatura] = nota
    asignatura = input("Introduce el nombre de la asignatura: ")
    contador = contador + 1
    suma = suma + nota
    if asignatura != "fin":
        nota = float(input("Introduce la nota correspondiente a la asignatura: "))

print("Resumen de las notas: ")
for asignatura, nota in notas.items():
    print(f"{asignatura}: {nota}")

total = suma / contador
print(f"La media total de las notas es: {total}")