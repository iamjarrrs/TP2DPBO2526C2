<?php
require_once "Motor.php";

// Motor (Multilevel Inheritance)
class MotorSport extends Motor {
    private $kecepatanMaksimal;
    private $harga;
    private $sistemPengereman;

    public function __construct($id = 0, $merk = "", $tahun = 0, $foto = "", $kapasitasMesin = 0, $jenisTransmisi = "", $kapasitasTangki = 0.0, $kecepatanMaksimal = 0, $harga = 0.0, $sistemPengereman = "") {
        parent::__construct($id, $merk, $tahun, $foto, $kapasitasMesin, $jenisTransmisi, $kapasitasTangki);
        $this->kecepatanMaksimal = $kecepatanMaksimal;
        $this->harga = $harga;
        $this->sistemPengereman = $sistemPengereman;
    }

    public function getKecepatanMaksimal() { return $this->kecepatanMaksimal; }
    public function setKecepatanMaksimal($kecepatanMaksimal) { $this->kecepatanMaksimal = $kecepatanMaksimal; }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = $harga; }

    public function getSistemPengereman() { return $this->sistemPengereman; }
    public function setSistemPengereman($sistemPengereman) { $this->sistemPengereman = $sistemPengereman; }
}
?>