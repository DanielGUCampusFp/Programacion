# Funcion para mostrar el menu de opciones luego
def mostrar_menu():
    print("Selecciona una opción:")
    print("1 - Cuadrado")
    print("2 - Rectángulo")
    print("3 - Salir")

# Funcion para hacer la forma del cuadrado
def mostrar_cuadrado(lado):
    for i in range(lado):
        print("* " * lado)

# Funcion para hacer la forma del rectangulo
def mostrar_rectangulo(base, altura):
    for i in range(altura):
        print("* " * base)

# Funcion para calcular el area del cuadrado
def calcular_area_cuadrado(lado):
    return lado * lado

# Funcion para calcular el perimetro del cuadrado
def calcular_perimetro_cuadrado(lado):
    return 4 * lado

# Funcion para calcular el area del rectangulo
def calcular_area_rectangulo(base, altura):
    return base * altura

# Funcion para calcular el perimetro del rectangulo
def calcular_perimetro_rectangulo(base, altura):
    return 2 * (base + altura)

# Programa principal donde se muestra el menú y te pide la opción
while True:
    mostrar_menu()
    opcion = input("Introduce el número de la opción: ")

    if opcion == '1':  # Opción para el cuadrado
        lado = int(input("Introduce el lado del cuadrado: "))
        print("Cuadrado:")
        mostrar_cuadrado(lado)
        print(f"Área del cuadrado: {calcular_area_cuadrado(lado)}")
        print(f"Perímetro del cuadrado: {calcular_perimetro_cuadrado(lado)}")

    elif opcion == '2':  # Opción para el rectángulo
        base = int(input("Introduce la base del rectángulo: "))
        altura = int(input("Introduce la altura del rectángulo: "))
        print("Rectángulo:")
        mostrar_rectangulo(base, altura)
        print(f"Área del rectángulo: {calcular_area_rectangulo(base, altura)}")
        print(f"Perímetro del rectángulo: {calcular_perimetro_rectangulo(base, altura)}")
    
    elif opcion == '3': # Opción salir del programa
        print("Has pulsado 3, se finalizará el programa.")
        break
    
    # Opción al introducir un numero erróneo
    else:
        print("Opción incorrecta. Por favor, selecciona 1 para Cuadrado, 2 para Rectángulo o 3 para salir del programa.")