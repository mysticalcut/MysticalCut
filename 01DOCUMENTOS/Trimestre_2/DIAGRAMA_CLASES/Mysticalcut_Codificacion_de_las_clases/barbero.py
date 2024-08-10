from usuario import Usuario

class Barbero(Usuario):

    def __init__(self,correo: str, telefono: int, contrasena: str, id_barbero: int, nombre: str, apellido: str, tipo_barbero: str):
        # el super se utiliza para saber que es una herencia
        super().__init__(correo, contrasena, telefono)
        self._id_barbero = id_barbero
        self._nombre = nombre
        self._apellido = apellido
        self._tipo_barbero = tipo_barbero

    def realizar_servicio(self):
        pass

    def consultar_disponibilidad(self):
        pass

    def modificar_horario(self):
        pass

    def id_barbero(self):
        return self.__id_barbero

    def id_barbero(self, value):
        self.__id_barbero = int(value)
