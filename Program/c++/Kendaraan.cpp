#include <iostream>

using namespace std;

// Base Class
class Kendaraan{
    private:
        int id;
        string merk;
        int tahun;
    
    public: 
        Kendaraan(){
        }

        // Constructor dengan parameter
        Kendaraan(int id, string merk, int tahun){
            this->id = id;
            this->merk = merk;
            this->tahun = tahun;
        }

        // Setter dan Getter
        void setId(int id){this->id = id;}
        int getId(){return id;}

        void setMerk(string merk){this->merk = merk;}
        string getMerk(){return merk;}

        void setTahun(int tahun){this->tahun = tahun;}
        int getTahun(){return tahun;}
    };