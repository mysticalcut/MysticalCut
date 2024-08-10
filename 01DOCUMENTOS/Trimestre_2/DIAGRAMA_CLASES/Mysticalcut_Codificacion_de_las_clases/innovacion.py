class Innovacion:
    def __init__(self, id_corte: int, nombre_corte: str, color_estetico: str):
        self._id_corte = id_corte
        self._nombre_corte = nombre_corte
        self._color_estetico = color_estetico

    def visualizar_corte(self):
        pass

    def editar_corte(self):
        pass

    def eliminar_corte(self):
        pass

    def id_corte(self):
        return self.__id_corte

    def id_corte(self, value):
        self.__id_corte = int(value)
