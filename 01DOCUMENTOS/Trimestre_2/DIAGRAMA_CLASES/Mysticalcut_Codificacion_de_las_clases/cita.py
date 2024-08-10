class Cita:
    def __init__(self, id_cita: int, fecha: str, hora: str, cliente: object, empleado: object, servicios: list):
        self._id_cita = id_cita
        self._fecha = fecha
        self._hora = hora
        self._cliente = cliente
        self._empleado = empleado
        self._servicios = servicios

    def reprogramar(self):
        pass

    def cancelar_cita(self):
        pass

    def visualizar_cita(self):
        pass

    def id_cita(self):
        return self.__id_cita

    def id_cita(self, value):
        self.__id_cita = int(value)
