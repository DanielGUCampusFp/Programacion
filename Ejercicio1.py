import random
objetos = ['estaca', 'poción mágica', 'hechizo']
monstruos = {'vampiro': 3, 'momia': 2, 'bruja': 4, 'esqueleto': 1, 'fantasma': 5 }

def seleccionar_monstruo():
    monstruos_lista = list(monstruos)
    elegir_monstruos = random.randint(0,4)
    monstruo_nombre = monstruos_lista[elegir_monstruos]
    monstruo_dificultad = monstruos[monstruo_nombre]
    return monstruo_nombre, monstruo_dificultad   

def calcular_probabilidad(monstruo_dificultad):
    # La probabilidad depende del nivel de dificultad: cuanto más alto, más difícil
    probabilidad = 100 - (monstruo_dificultad * 18)  # Dificultad 1 = 82%, 2 = 64%, 3 = 46%, 4 = 28%, 5 = 10%
    probabilidad_exito = random.randint(1, 100)
    return probabilidad_exito <= probabilidad

# Función principal de caza de monstruos
def caza_monstruo():
    print("¡Bienvenido a la caza de monstruos de Halloween!")
    monstruo, dificultad = seleccionar_monstruo()
    print(f"\n¡Un {monstruo} ha aparecido con dificultad {dificultad}!")

    intentos = 3  # El jugador tiene 3 intentos

    while intentos != 0:
        print(f"\nTienes {intentos} intentos restantes.")
        print(f"Elige un objeto para intentar capturar al {monstruo}: estaca, poción mágica, hechizo")
        objeto = input("Escribe el nombre del objeto: ").lower()

        if objeto not in objetos:
            print(f"El objeto {objeto} no es válido. Por favor elige entre estaca, poción mágica o hechizo.")
        
        # Comprobamos si el jugador captura el monstruo
        if calcular_probabilidad(dificultad):
            print(f"¡Has capturado al {monstruo}!")
            break
        else:
            print(f"Fallaste al intentar capturar al {monstruo}.")
            
        intentos -= 1

    if intentos == 0:
        print(f"\n¡El {monstruo} ha escapado! Mejor suerte la próxima vez.")

# Ejecutar el juego
caza_monstruo()