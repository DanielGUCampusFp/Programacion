import mysql.connector

def conectar_base_datos():
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="curso",
        database="Gimnasio"
    )
    return conexion