#include <iostream>
#include "Motor.cpp"

// Subclass dari Motor / multilevel inheritance
class MotorSport : public Motor {
    private:
        int kecepatanMaksimal; // km/h
        double harga;           // Rp
        string sistemPengereman;

    public:
        // Default Constructor
        MotorSport() : Motor() {
            this->kecepatanMaksimal = 0;
            this->harga = 0.0;
            this->sistemPengereman = "";
        }

        // Constructor dengan Parameter
        MotorSport(int id, string merk, int tahun, int kapasitasMesin, string jenisTransmisi, double kapasitasTangki, int kecepatanMaksimal, double harga, string sistemPengereman) : Motor(id, merk, tahun, kapasitasMesin, jenisTransmisi, kapasitasTangki) {
            this->kecepatanMaksimal = kecepatanMaksimal;
            this->harga = harga;
            this->sistemPengereman = sistemPengereman;
        }

        // Getter dan Setter Kecepatan Maksimal
        void setKecepatanMaksimal(int kecepatanMaksimal) { this->kecepatanMaksimal = kecepatanMaksimal; }
        int getKecepatanMaksimal() { return this->kecepatanMaksimal; }

        // Getter dan Setter Harga
        void setHarga(double harga) { this->harga = harga; }
        double getHarga() { return this->harga; }

        // Getter dan Setter Sistem Pengereman
        void setSistemPengereman(string sistemPengereman) { this->sistemPengereman = sistemPengereman; }
        string getSistemPengereman() { return this->sistemPengereman; }

        // Destructor
        ~MotorSport() {}
};