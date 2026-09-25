from Kendaraan import Kendaraan

# Subclass dari Kendaraan (Inheritance)
class Motor(Kendaraan):
    def __init__(self, id_kendaraan=0, merk="", tahun=0, kapasitas_mesin=0, jenis_transmisi="", kapasitas_tangki=0.0):
        # Memanggil constructor milik class Kendaraan
        super().__init__(id_kendaraan, merk, tahun)
        self._kapasitas_mesin = kapasitas_mesin
        self._jenis_transmisi = jenis_transmisi
        self._kapasitas_tangki = kapasitas_tangki

    # Getter dan Setter untuk Kapasitas Mesin
    def get_kapasitas_mesin(self):
        return self._kapasitas_mesin

    def set_kapasitas_mesin(self, kapasitas_mesin):
        self._kapasitas_mesin = kapasitas_mesin

    # Getter dan Setter untuk Jenis Transmisi
    def get_jenis_transmisi(self):
        return self._jenis_transmisi

    def set_jenis_transmisi(self, jenis_transmisi):
        self._jenis_transmisi = jenis_transmisi

    # Getter dan Setter untuk Kapasitas Tangki
    def get_kapasitas_tangki(self):
        return self._kapasitas_tangki

    def set_kapasitas_tangki(self, kapasitas_tangki):
        self._kapasitas_tangki = kapasitas_tangki