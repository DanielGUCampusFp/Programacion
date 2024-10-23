num = 0
num = int(input("Introduce un numero: "))
contador = 0
suma = num

while num != 0:
    num = int(input("Introduce otro numero: "))
    contador += 1
    suma += num
    if num == 0:
        print("El numero introducido es 0, se finaliza el programa.")
        print("Has puesto un total de", contador,"numeros")
        print("Y la suma total de esos numeros es: ", suma)
        print("El promedio de los numeros introducidos es: ", suma/contador)
        break