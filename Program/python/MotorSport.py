from Motor import Motor

# Subclass dari Motor (Multilevel Inheritance)
class MotorSport(Motor):
    def __init__(self, id_kendaraan=0, merk="", tahun=0, kapasitas_mesin=0, jenis_transmisi="", kapasitas_tangki=0.0, kecepatan_maksimal=0, harga=0.0, sistem_pengereman=""):
        # Memanggil constructor milik class Motor
        super().__init__(id_kendaraan, merk, tahun, kapasitas_mesin, jenis_transmisi, kapasitas_tangki)
        self._kecepatan_maksimal = kecepatan_maksimal
        self._harga = harga
        self._sistem_pengereman = sistem_pengereman

    # Getter dan Setter untuk Kecepatan Maksimal
    def get_kecepatan_maksimal(self):
        return self._kecepatan_maksimal

    def set_kecepatan_maksimal(self, kecepatan_maksimal):
        self._kecepatan_maksimal = kecepatan_maksimal

    # Getter dan Setter untuk Harga
    def get_harga(self):
        return self._harga

    def set_harga(self, harga):
        self._harga = harga

    # Getter dan Setter untuk Sistem Pengereman
    def get_sistem_pengereman(self):
        return self._sistem_pengereman

    def set_sistem_pengereman(self, sistem_pengereman):
        self._sistem_pengereman = sistem_pengereman