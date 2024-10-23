lista_reproduccion = []

cancion = input("Ingresa el nombre de la canción: ").lower()

while cancion != "fin":
    lista_reproduccion.append(cancion)
    cancion = input("Dame el nombre de otra canción: ").lower()
    
print("Tu lista de reproduccion es: ")

for i in range(len(lista_reproduccion)):
    print(f"{i + 1}.- {lista_reproduccion[i]}")

cancion_a_reproducir = int(input("Dime el número de cancion que quieres escuchar: ")) - 1
print(f"Estas escuchando la cancion: {lista_reproduccion[cancion_a_reproducir]}")
