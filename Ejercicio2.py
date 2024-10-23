agenda = {}
nombre = input("Ingresa el nombre del contacto(o fin para acabar): ").lower()
telefono = int(input("Ingresa el telefono del contacto: "))

while nombre != "fin":
    agenda [nombre] = telefono
    nombre = input("Ingresa el nombre del contacto(o fin para acabar): ").lower()
    if nombre != "fin":
        telefono = int(input("Ingresa el telefono del contacto: "))
print(agenda)
elegir = input("Ingresa el nombre de quien quieres buscar: ")
print(f"El telefono de {elegir} es {agenda[elegir]}")