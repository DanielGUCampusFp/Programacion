# Bucle para introducer un numero de dinero correcto
while True:
    saldo = float(input("Introduce el saldo inicial de la cuenta: "))
    if saldo < 0:
        print("Saldo no posible, introduce uno posible: ")
        print(saldo)
    else:
        break


def mostrar_menu():
    print("\nSelecciona una opción:")
    print("1 - Ingresar dinero")
    print("2 - Retirar dinero")
    print("3 - Mostrar Saldo")
    print("4 - Estadísticas")
    print("5 - Salir")


# Determinar la cantidad de ingreso y retiradas al inicio
ingresos = 0
retiradas = 0


# Bucle para repetir el programa todo el rato hasta pulsar 5
while True:
    mostrar_menu()
    opcion = int(input("\nIntroduce el número de la opción: "))
    # Si eliges 1 ingresas dinero y no puede ser negativo el dinero
    if opcion == 1:
        cantidad = float(input("Introduce la cantidad de dinero que quieres ingresar: "))
        if cantidad < 0:
            print("La cantidad no puede ser negativa. Inténtalo de nuevo.")
        else:
            saldo += cantidad
            ingresos += 1
    # Si eliges 2 retiras dinero y sigue sin poder introducir una cantidad negativa
    elif opcion == 2:
        cantidad = float(input("Introduce la cantidad de dinero que quieres retirar: "))
        if cantidad < 0:
            print("La cantidad no puede ser negativa. Inténtalo de nuevo.")
        else:
            saldo -= cantidad
            retiradas += 1
            if saldo < 0:
                print("No tienes suficiente dinero para sacar")
                saldo += cantidad
    # Si eliges 3 te mostrara la cantidad de dinero actual incluso despues de cada ingreso
    elif opcion == 3:
        print(f"La cantidad total de dinero actualmente es: {saldo}")
    # Si eliges 4 te mostrara la cantidad de ingresos y retiradas
    elif opcion == 4:
            print(f"Ingresos: {ingresos}, Retiradas: {retiradas}")
    # Si eliges 5 se finaliza el programa
    elif opcion == 5:
        print("Has pulsado 5, se finalizará el programa")
        break
    else:
        print("Numero no asignado a ninguna operacion, vuelve a introducirlo")