num1 = int(input("Ingresa el primer numero: "))
num2 = int(input("Ingresa el segundo numero: "))
ope = input("Ingresa que operacion matematica quieres hacer(+, -, * o /): ")

if ope == "+":
    suma = num1 + num2
    print(f"El resultado de la suma es: {suma}")
elif ope == "-":
    resta = num1 - num2
    print(f"El resultado de la resta es: {resta}")
elif ope == "*":
    multiplicacion = num1 + num2
    print(f"El resultado de la suma es: {multiplicacion}")
elif ope == "/":
    if num2 == 0:
        print("ERROR")
    else: 
        division = num1 / num2
        print(f"El resultado de la suma es: {division}")
else:
    print("Introduce una operacion valida.")