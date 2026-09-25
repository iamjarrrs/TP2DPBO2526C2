#include <iostream>
#include "Kendaraan.cpp"

// subclass dari kendaraan
class Motor : public Kendaraan {
    private:
        int kapasitasMesin; // dalam cc
        string jenisTransmisi; // manual / otomatis
        double kapasitasTangki; // dalam liter

    public: 
        // Default Constructor
        Motor() : Kendaraan() {
            this->kapasitasMesin = 0;
            this->jenisTransmisi = "";
            this->kapasitasTangki = 0.0;
        }

        // Constructor dengan Parameter
        Motor(int id, string merk, int tahun, int kapasitasMesin, string jenisTransmisi, double kapasitasTangki) 
            : Kendaraan(id, merk, tahun) {
            this->kapasitasMesin = kapasitasMesin;
            this->jenisTransmisi = jenisTransmisi;
            this->kapasitasTangki = kapasitasTangki;
        }

        // Getter dan Setter Kapasitas Mesin
        void setKapasitasMesin(int kapasitasMesin) { this->kapasitasMesin = kapasitasMesin; }
        int getKapasitasMesin() { return this->kapasitasMesin; }

        // Getter dan Setter Jenis Transmisi
        void setJenisTransmisi(string jenisTransmisi) { this->jenisTransmisi = jenisTransmisi; }
        string getJenisTransmisi() { return this->jenisTransmisi; }

        // Getter dan Setter Kapasitas Tangki
        void setKapasitasTangki(double kapasitasTangki) { this->kapasitasTangki = kapasitasTangki; }
        double getKapasitasTangki() { return this->kapasitasTangki; }

        // Destructor
        ~Motor() {}

};