class Servicios:
    def __init__(self, id_servicio: int, nombre: str, duracion: int, precio: float, productos: list):
        self._id_servicio = id_servicio
        self._nombre = nombre
        self._duracion = duracion
        self._precio = precio
        self._productos = productos

    def calcular_precio_total(self):
        pass

    def id_servicio(self):
        return self.__id_servicio

    def id_servicio(self, value):
        self.__id_servicio = int(value)

