import random
objetos = ['estaca', 'poción mágica', 'hechizo']
monstruos = {'vampiro': 3, 'momia': 2, 'bruja': 4, 'esqueleto': 1, 'fantasma': 5 }
intentos = 3

        
monstruos_lista = list(monstruos)
elegir_monstruos = random.randint(1,5)
monstruo_nombre = monstruos_lista[elegir_monstruos]
monstruo_dificultad = monstruos[monstruo_nombre]


while intentos != 0:
    print("¡Bienvenido a la caza de monstruos de Halloween!")
    print(f"Un/a {monstruo_nombre} ha aparecido con dificultad {monstruo_dificultad}.\n")
    print(f"Tienes {intentos} intentos.")
    print(f"Elige un objeto para intentar capturar al/a la {monstruo_nombre}: estaca, poción mágica, hechizo")
    objeto = input("Escribe el nombre del objeto: ")
    probabilidad_exito = random.randint(0,101)
    probabilidad_monstruos = monstruo_dificultad * (probabilidad_exito / 100)
    probabilidad_porcentaje_objetos = random.randint(0, probabilidad_exito)
    probabilidad_objetos = probabilidad_porcentaje_objetos * (probabilidad_exito / 100)

    if probabilidad_objetos > probabilidad_monstruos:
        print("Has capturado el monstruo enhorabuena")
        break
    else:
        print("Intento fallido, intentalo otra vez")
        intentos = intentos - 1
        print(f"Tienes {intentos} intentos restantes")







'''
print(f"Tienes {intentos_restantes} intentos restantes.")
print(f"Elige un objeto para intentar capturar al {monstruo}: estaca, poción mágica, hechizo")
objeto = input("Escribe el nombre del objeto:")
print(respuesta_al_intento)Fallaste al intentar capturar al vampiro con un/a {objeto}.'''