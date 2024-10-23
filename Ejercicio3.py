nombre = input("Introduce un nombre: ")
nombres = []

while True:
    nombres.append(nombre)
    nombre = input("Introduce otro nombre mas: ")
    if nombre == "fin":
        print("Los nombres ingresados son: ", nombres)
        break
print("Lista de nombres: ")
for nombre in nombres:
    print("-", nombre)