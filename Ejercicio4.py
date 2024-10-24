# Filtrar libros por categoría

libros = [
    {"Libro" : "Blancanieves", "Genero" : "Poesía"},
    {"Libro" : "El niño con pijama de rayas", "Genero" : "Enseayo"}, 
    {"Libro" : "El Quijote", "Genero" : "Novela"}, 
    {"Libro" : "Jujutsu Kaisen", "Genero" : "Comedia"},
]

def es_novela(libro):
    return libro["Genero"] == "Novela"

novela = list(filter(es_novela, libros))
print("Los libros de novelas disponibles son: ")
for libro in novela:
    print(libro)