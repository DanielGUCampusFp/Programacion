# Programa que reciba un numero entero y devuelva True o False
def es_primo(numero):
    # Primero comprobar que el numero establecido para saber si es primo es mayor que 0
    if numero < 0:
        return False
    # Ahora comprobar si es divisible de entre el numero 2 hasta el numero introducido
    for i in range(2, numero):
        # Si el numero llega a ser divisible entre uno que no sea el mismo devolvera el valor a falso
        if numero % i == 0:
            return False
        else:
            return True
        
print("Este numero es: ", es_primo(7))  # Debería imprimir True
print("Este numero es: ", es_primo(10)) # Debería imprimir False