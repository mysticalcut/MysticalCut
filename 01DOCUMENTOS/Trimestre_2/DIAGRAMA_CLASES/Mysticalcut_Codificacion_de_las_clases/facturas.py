class Facturas:
    def __init__(self, id_factura: int, fecha: str, cliente: object, servicios: list, precio_total: float):
        self._id_factura = id_factura
        self._fecha = fecha
        self._cliente = cliente
        self._servicios = servicios
        self._precio_total = precio_total

    def generar_factura(self):
        pass

    def id_factura(self):
        return self.__id_factura

    def id_factura(self, value):
        self.__id_factura = int(value)
