<?php
// Base Class
class Kendaraan {
    protected $id;
    protected $merk;
    protected $tahun;
    protected $foto;

    public function __construct($id = 0, $merk = "", $tahun = 0, $foto = "") {
        $this->id = $id;
        $this->merk = $merk;
        $this->tahun = $tahun;
        $this->foto = $foto;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getMerk() { return $this->merk; }
    public function setMerk($merk) { $this->merk = $merk; }

    public function getTahun() { return $this->tahun; }
    public function setTahun($tahun) { $this->tahun = $tahun; }

    public function getFoto() { return $this->foto; }
    public function setFoto($foto) { $this->foto = $foto; }
}
?>