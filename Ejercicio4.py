contraseña_correcta = "python123"
contraseña_introducida = input("Ingresa la contraseña para iniciar sesión: ")

while True:
    if contraseña_correcta == contraseña_introducida:
        print("Contraseña correcta, ¡Acceso concedido!")
        break
    else:
        print("Contraseña introducida incorrecta, vuelve a intentarlo.")
        contraseña_introducida = input("Ingresa la contraseña otra vez: ")