# Importamos la librería random
import random

def mostrar_menu():
    print("1 - Piedra")
    print("2 - Papel")
    print("3 - Tijera")

# Función para convertir la elección de número a Piedra, Papel o Tijera
def saber_eleccion(eleccion):
    if eleccion == 1:
        return "Piedra"
    elif eleccion == 2:
        return "Papel"
    elif eleccion == 3:
        return "Tijera"

# Función para determinar el ganador
def comprobar_ganador(eleccion, eleccion_maquina):
    if eleccion == eleccion_maquina:
        return "Empate"
    elif eleccion == 1 and eleccion_maquina == 3 or eleccion == 2 and eleccion_maquina == 1 or eleccion == 3 and eleccion_maquina == 2:
        return "Usuario"
    else:
        return "Máquina"

# Contadores de partidas ganadas empezando por 0
usuario_gana = 0
maquina_gana = 0

# Bucle hasta que el usuario o la máquina gane 3 partidas
while usuario_gana < 3 and maquina_gana < 3:
    # Solicitar al usuario una opción válida
    while True:
        mostrar_menu()
        eleccion = int(input("\nElige una opción: "))
        if eleccion in [1, 2, 3]:
            break
        else:
            print("Opción inválida. Inténtalo de nuevo.")

    # Generar elección aleatoria de la máquina
    eleccion_maquina = random.randint(1, 3)

    # Mostrar las elecciones
    print(f"Usuario eligió: {saber_eleccion(eleccion)}")
    print(f"Máquina eligió: {saber_eleccion(eleccion_maquina)}")

    # Determinar el ganador de la ronda
    ganador = comprobar_ganador(eleccion, eleccion_maquina)
    if ganador == "Empate":
        print("Es un empate!")
    elif ganador == "Usuario":
        print("Has ganado esta ronda!")
        usuario_gana += 1
    else:
        print("La máquina ha ganado esta ronda.")
        maquina_gana += 1

    # Mostrar marcador
    print(f"Marcador: Usuario {usuario_gana} - {maquina_gana} Máquina\n")

# Marcar la cantidad de victorias para cada uno para finalizar el bucle
if usuario_gana == 3:
    print("¡Felicidades! Has ganado el juego.")
else:
    print("La máquina ha ganado el juego. Mejor suerte la próxima vez.")