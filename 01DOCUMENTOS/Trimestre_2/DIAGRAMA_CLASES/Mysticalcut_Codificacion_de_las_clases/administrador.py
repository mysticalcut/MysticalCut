from usuario import Usuario

class Administrador(Usuario):
    
    def __init__(self, correo: str, telefono: int, contrasena: str, id_administrador: int, nombre: str, usuario: str):
        # el super se utiliza para saber que es una herencia
        super().__init__(correo, contrasena, telefono)
        self._id_administrador = id_administrador
        self._nombre = nombre
        self._usuario = usuario

    def agregar_empleado(self):
        pass

    def modificar_precio(self):
        pass

    def generar_reportes(self):
        pass

    def gestionar_inventario(self):
        pass

    def modificar_horarios(self):
        pass

    def bloquear_usuario(self):
        pass

    def eliminar_usuario(self):
        pass

    def id_administrador(self):
        return self.__id_administrador

    def id_administrador(self, value):
        self.__id_administrador = int(value)
