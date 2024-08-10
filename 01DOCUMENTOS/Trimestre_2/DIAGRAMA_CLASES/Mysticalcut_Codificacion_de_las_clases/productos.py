class Productos:
    def __init__(self, id_producto: int, nombre: str, descripcion: str, precio_compra: float):
        self._id_producto = id_producto
        self._nombre = nombre
        self._descripcion = descripcion
        self._precio_compra = precio_compra

    def calcular_precio(self):
        pass

    def modificar_seleccion(self):
        pass

    def cancelar_seleccion(self):
        pass

    def id_producto(self):
        return self.__id_producto

    def id_producto(self, value):
        self.__id_producto = int(value)
