class Inventario:
    def __init__(self, id_stock: int, nombre_producto: str, cantidad: int, precio_unitario: float):
        self._id_stock = id_stock
        self._nombre_producto = nombre_producto
        self._cantidad = cantidad
        self._precio_unitario = precio_unitario

    def agregar_producto(self):
        pass

    def eliminar_producto(self):
        pass

    def modificar_producto(self):
        pass

    def actualizar_cantidad(self):
        pass

    def verificar_stock(self):
        pass

    def id_stock(self):
        return self.__id_stock

    def id_stock(self, value):
        self.__id_stock = int(value)
