class Proveedor:
    def __init__(self, id_proveedor: int, nombre_proveedor: str, telefono: int, correo: str, direccion: str):
        self._id_proveedor = id_proveedor
        self._nombre_proveedor = nombre_proveedor
        self._telefono = telefono
        self._correo = correo
        self._direccion = direccion

    def agregar_proveedor(self):
        pass

    def cambiar_proveedor(self):
        pass

    def generar_factura(self):
        pass

    def id_proveedor(self):
        return self.__id_proveedor

    def id_proveedor(self, value):
        self.__id_proveedor = int(value)
