class Cliente:
    def __init__(self, id_cliente: int, nombre: str, apellido: str, telefono: int, correo: str, historial_servicios: list):
        self._id_cliente = id_cliente
        self._nombre = nombre
        self._apellido = apellido
        self._telefono = telefono
        self._correo = correo
        self._historial_servicios = historial_servicios

    def registrar_cita(self):
        pass

    def ver_historial(self):
        pass

    def id_cliente(self):
        return self.__id_cliente

    def id_cliente(self, value):
        self.__id_cliente = int(value)
