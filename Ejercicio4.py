import random

num_secreto = random.randint(1, 100) 
num_introducido = 0

print("Vamos a jugar a un juego.")
print("Intenta adivinal el número que se ha generado aleatoriamente entre el 1 y el 100, intentalo")

while num_introducido != num_secreto:
    num_introducido  = int(input("Introduce el numero para intentar adivinarlo: "))
    if num_introducido < num_secreto:
        print("El número introducido es menor que el número secreto")
    elif num_introducido > num_secreto:
        print("El número introducido es mayor que el número secreto")
    else:
        print(f"Enhorabuena, has adivinado el número secreto, era el {num_secreto}")