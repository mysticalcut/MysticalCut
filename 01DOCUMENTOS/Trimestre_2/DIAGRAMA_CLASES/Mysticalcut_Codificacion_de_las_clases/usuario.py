class Usuario:
    def __init__(self, id_usuario: int, nombre: str, correo: str, telefono: int, contrasena: str, rol: str):
        self._id_usuario = id_usuario
        self._nombre = nombre
        self._correo = correo
        self._telefono = telefono
        self._contrasena = contrasena
        self._rol = rol

    def registrar(self):
        pass

    def iniciar_sesion(self):
        pass

    def modificar_dato(self):
        pass

    def id_usuario(self):
        return self.__id_usuario

    def id_usuario(self, value):
        self.__id_usuario = int(value)
