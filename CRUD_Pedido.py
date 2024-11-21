import DEF_Conectar

def menu_pedido():
    print("\n=== Gestión de Pedidos ===")
    print("1. Realizar Compra")
    print("2. Seguir Pedido")
    print("3. Volver\n")

def main_pedido():
    while True:
        menu_pedido()
        opcion = int(input("Seleccione una opción: "))
        match opcion:
            case 1:
                realizar_compra()
            case 2:
                seguir_pedido()
            case 3:
                break
            case _:
                print("Introduce un valor correcto")

def realizar_compra():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        print("Realizar Compra")
        email = input("Introduce tu email para relacionar la compra: ")

        # Verificar que el cliente está registrado
        cursor.execute("SELECT cliente_id FROM clientes WHERE email = %s", (email,))
        cliente = cursor.fetchone()
        if not cliente:
            print("Cliente no registrado. Debes registrarte primero.")
            cursor.close()
            conexion.close()
            return

        # Relacionar los ID de los clientes con los clientes
        cliente_id = cliente[0]
    
        # Mostrar productos disponibles
        cursor.execute("SELECT producto_id, nombre, precio FROM productos")
        productos = cursor.fetchall()
    
        print("Productos disponibles:")
        # Mostrar con el for todos los producto disponibles y colocando la posicion del producto gracias a la lista
        for producto in productos:
            print(f"{producto[0]}. {producto[1]} - ${producto[2]}")
        
        carrito = [] # Convertir carrito en una lista
        while True:
            producto_id = input("Elige un producto por su ID o escribe 'fin' para terminar: ")
            if producto_id == 'fin':
                break
                
            cantidad = input("¿Cuántos deseas comprar?: ")
            if producto_id and cantidad:
                carrito.append((int(producto_id), int(cantidad))) # Almacenar en la lista el producto id y la cantidad y ademas solo puediendo poner un numero entero
            else:
                print("Entrada no válida. Intenta nuevamente.")
    
        # Insertar pedido metiendo todos los productos en conjunto a una variable llamada carrito
        if carrito:
            cursor.execute("INSERT INTO pedidos (cliente_id) VALUES (%s)", (cliente_id,))
            conexion.commit()
            pedido_id = cursor.lastrowid # Para que cuando de error no se sume con el auto_increment uno mas al id sin crear el pedido
        
            # Insertar productos en el pedido
            for producto_id, cantidad in carrito:
                consulta = ("INSERT INTO pedido_productos (pedido_id, producto_id, cantidad) VALUES (%s, %s, %s)")
                cursor.execute(consulta, (pedido_id, producto_id, cantidad))
            conexion.commit()
        
            print(f"Compra realizada con éxito. Tu número de pedido es: {pedido_id}")
        else:
            print("No seleccionaste productos. Compra cancelada.")
        cursor.close()
        conexion.close()
    except:
        print("Pedido no creado.")

def seguir_pedido():
    try:
        conexion = DEF_Conectar.conectar_base_datos()
        cursor = conexion.cursor()

        print("Seguimiento de Pedido")
        pedido_id = input("Introduce tu número de pedido: ")
        
        if not pedido_id:
            print("Número de pedido no válido.")
            cursor.close()
            conexion.close()
            return
    
        cursor.execute("""
            SELECT p.pedido_id, c.nombre, c.email, c.direccion, c.telefono, p.fecha 
            FROM pedidos p
            JOIN clientes c ON p.cliente_id = c.cliente_id
            WHERE p.pedido_id = %s
        """, (pedido_id,))
        pedido = cursor.fetchone()
    
        if not pedido:
            print("Pedido no encontrado.")
        else:
            print(f"Detalles del pedido {pedido_id}:")
            print(f"Cliente: {pedido[1]} ({pedido[2]})")
            print(f"Dirección de envío: {pedido[3]}")
            print(f"Teléfono: {pedido[4]}")
            print(f"Fecha del pedido: {pedido[5]}")
        
            # Mostrar productos del pedido
            cursor.execute("""
                SELECT pr.nombre, pp.cantidad, pr.precio 
                FROM pedido_productos pp
                JOIN productos pr ON pp.producto_id = pr.producto_id
                WHERE pp.pedido_id = %s
            """, (pedido_id,))
            productos = cursor.fetchall()
        
            print("Productos en el pedido:")
            for producto in productos:
                print(f"{producto[0]} - {producto[1]} unidades - ${producto[2]} cada uno")
    
        cursor.close()
        conexion.close()
    except:
        print("Error, pedido no encontrado.")
