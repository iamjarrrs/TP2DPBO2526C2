<?php
require_once "Kendaraan.php";

// Level 2: Subclass dari Kendaraan
class Motor extends Kendaraan {
    protected $kapasitasMesin;
    protected $jenisTransmisi;
    protected $kapasitasTangki;

    public function __construct($id = 0, $merk = "", $tahun = 0, $foto = "", $kapasitasMesin = 0, $jenisTransmisi = "", $kapasitasTangki = 0.0) {
        parent::__construct($id, $merk, $tahun, $foto);
        $this->kapasitasMesin = $kapasitasMesin;
        $this->jenisTransmisi = $jenisTransmisi;
        $this->kapasitasTangki = $kapasitasTangki;
    }

    public function getKapasitasMesin() { return $this->kapasitasMesin; }
    public function setKapasitasMesin($kapasitasMesin) { $this->kapasitasMesin = $kapasitasMesin; }

    public function getJenisTransmisi() { return $this->jenisTransmisi; }
    public function setJenisTransmisi($jenisTransmisi) { $this->jenisTransmisi = $jenisTransmisi; }

    public function getKapasitasTangki() { return $this->kapasitasTangki; }
    public function setKapasitasTangki($kapasitasTangki) { $this->kapasitasTangki = $kapasitasTangki; }
}
?>