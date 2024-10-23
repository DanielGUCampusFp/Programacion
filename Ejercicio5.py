caloriastotales = 0
pagartotal = 0
menu = {
    "Café": (2.50, 5),
    "Té": (1.50, 2),
    "Pastel de chocolate": (3.00, 350),
    "Galleta": (1.00, 150),
    "Sándwich": (4.00, 300)
}
print("Menú de la cafeteria: ")
for nombre, precio in menu.items():
    print(nombre, ":", precio)


producto = input("Ingreso el nombre del producto que quieres: ")
while producto != "fin":
    precio , calorias = menu[producto]
    pagartotal += precio
    caloriastotales += calorias
    producto = input("Ingresa el nombre del siguiente producto que quieres: ")
print(f"El total de precio a pagar es de {pagartotal}")
print(f"El total de calorias es de {caloriastotales}kcal")