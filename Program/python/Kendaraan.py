# Base class
class Kendaraan:
    def __init__(self, id_kendaraan=0, merk="", tahun=0):
        # Atribut private / encapsulated menggunakan prefix underscore
        self._id = id_kendaraan
        self._merk = merk
        self._tahun = tahun

    # Getter dan Setter untuk ID
    def get_id(self):
        return self._id

    def set_id(self, id_kendaraan):
        self._id = id_kendaraan

    # Getter dan Setter untuk Merk
    def get_merk(self):
        return self._merk

    def set_merk(self, merk):
        self._merk = merk

    # Getter dan Setter untuk Tahun
    def get_tahun(self):
        return self._tahun

    def set_tahun(self, tahun):
        self._tahun = tahun