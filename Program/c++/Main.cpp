#include <iostream>
#include "MotorSport.cpp"

using namespace std;

// Helper: Menghitung panjang integer sebagai string
int getIntLength(long long val) {
    if (val == 0) return 1;
    int len = 0;
    if (val < 0) { len++; val = -val; }
    while (val > 0) {
        val /= 10;
        len++;
    }
    return len;
}

// Helper: Menghitung panjang double (1 angka dibelakang koma)
int getDoubleLength(double val) {
    long long integerPart = (long long)val;
    return getIntLength(integerPart) + 2; // +1 titik desimal, +1 angka di belakang koma
}

// Helper: Konversi integer ke string manual
string intToString(long long val) {
    if (val == 0) return "0";
    string res = "";
    bool isNegative = false;
    if (val < 0) { isNegative = true; val = -val; }
    while (val > 0) {
        res = (char)('0' + (val % 10)) + res;
        val /= 10;
    }
    if (isNegative) res = "-" + res;
    return res;
}

// Helper: Konversi double ke string manual (1 angka desimal)
string doubleToString(double val) {
    long long integerPart = (long long)val;
    int decimalPart = (int)((val - integerPart) * 10);
    if (decimalPart < 0) decimalPart = -decimalPart;
    return intToString(integerPart) + "." + intToString(decimalPart);
}

// Helper: Konversi harga double ke string (tanpa koma desimal)
string hargaToString(double val) {
    long long integerPart = (long long)val;
    return intToString(integerPart);
}

// Helper: Menggantikan fungsi setw() untuk mencetak teks dengan padding rata kiri
void printPadded(string text, int width) {
    cout << text;
    int padding = width - text.length();
    for (int i = 0; i < padding; i++) {
        cout << " ";
    }
}

// Helper: Mencetak garis pembatas tabel
void printGaris(int widths[], int colCount) {
    cout << "+";
    for (int i = 0; i < colCount; i++) {
        for (int j = 0; j < widths[i] + 2; j++) cout << "-";
        cout << "+";
    }
    cout << endl;
}

// Procedure mencetak tabel dinamis tanpa library iomanip/vector
void cetakTabelDinamis(MotorSport daftarMotor[], int jumlahData) {
    string headers[] = {"ID", "MERK", "TAHUN", "MESIN (cc)", "TRANSMISI", "TANGKI (L)", "MAX SPEED", "HARGA (RP)", "PENGEREMAN"};
    int colCount = 9;
    int colWidths[9];

    // Hitung panjang dari teks header
    for (int i = 0; i < colCount; i++) {
        colWidths[i] = headers[i].length();
    }

    // Hitung lebar maksimum tiap kolom secara dinamis berdasarkan data
    for (int i = 0; i < jumlahData; i++) {
        int idLen = getIntLength(daftarMotor[i].getId());
        if (idLen > colWidths[0]) colWidths[0] = idLen;

        int merkLen = daftarMotor[i].getMerk().length();
        if (merkLen > colWidths[1]) colWidths[1] = merkLen;

        int tahunLen = getIntLength(daftarMotor[i].getTahun());
        if (tahunLen > colWidths[2]) colWidths[2] = tahunLen;

        int mesinLen = getIntLength(daftarMotor[i].getKapasitasMesin());
        if (mesinLen > colWidths[3]) colWidths[3] = mesinLen;

        int transmisiLen = daftarMotor[i].getJenisTransmisi().length();
        if (transmisiLen > colWidths[4]) colWidths[4] = transmisiLen;

        int tangkiLen = getDoubleLength(daftarMotor[i].getKapasitasTangki());
        if (tangkiLen > colWidths[5]) colWidths[5] = tangkiLen;

        int speedLen = getIntLength(daftarMotor[i].getKecepatanMaksimal()) + 5; // + " km/h"
        if (speedLen > colWidths[6]) colWidths[6] = speedLen;

        int hargaLen = getIntLength((long long)daftarMotor[i].getHarga());
        if (hargaLen > colWidths[7]) colWidths[7] = hargaLen;

        int remLen = daftarMotor[i].getSistemPengereman().length();
        if (remLen > colWidths[8]) colWidths[8] = remLen;
    }

    // Cetak Header Tabel
    printGaris(colWidths, colCount);
    cout << "|";
    for (int i = 0; i < colCount; i++) {
        cout << " ";
        printPadded(headers[i], colWidths[i]);
        cout << " |";
    }
    cout << endl;
    printGaris(colWidths, colCount);

    // Cetak Baris Data
    for (int i = 0; i < jumlahData; i++) {
        cout << "| ";
        printPadded(intToString(daftarMotor[i].getId()), colWidths[0]); cout << " | ";
        printPadded(daftarMotor[i].getMerk(), colWidths[1]); cout << " | ";
        printPadded(intToString(daftarMotor[i].getTahun()), colWidths[2]); cout << " | ";
        printPadded(intToString(daftarMotor[i].getKapasitasMesin()), colWidths[3]); cout << " | ";
        printPadded(daftarMotor[i].getJenisTransmisi(), colWidths[4]); cout << " | ";
        printPadded(doubleToString(daftarMotor[i].getKapasitasTangki()), colWidths[5]); cout << " | ";
        printPadded(intToString(daftarMotor[i].getKecepatanMaksimal()) + " km/h", colWidths[6]); cout << " | ";
        printPadded(hargaToString(daftarMotor[i].getHarga()), colWidths[7]); cout << " | ";
        printPadded(daftarMotor[i].getSistemPengereman(), colWidths[8]); cout << " |" << endl;
    }
    printGaris(colWidths, colCount);
}

int main() {
    // Array statis penampung objek (Kapasitas maks misal 100)
    MotorSport daftarMotor[100];
    int jumlahData = 0;

    // 5 Objek Awal
    daftarMotor[jumlahData++] = MotorSport(1, "Kawasaki ZX-25R", 2023, 250, "Manual 6-Speed", 15.0, 187, 105000000, "Dual Disc ABS");
    daftarMotor[jumlahData++] = MotorSport(2, "Yamaha YZF-R6", 2022, 599, "Manual 6-Speed", 17.0, 257, 270000000, "Dual Disc ABS");
    daftarMotor[jumlahData++] = MotorSport(3, "Honda CBR1000RR-R", 2024, 999, "Manual 6-Speed", 16.1, 299, 1076000000, "Brembo Dual Disc ABS");
    daftarMotor[jumlahData++] = MotorSport(4, "Ducati Panigale V4", 2023, 1103, "Manual 6-Speed", 16.0, 300, 799000000, "Brembo Stylema ABS");
    daftarMotor[jumlahData++] = MotorSport(5, "KTM RC 390", 2022, 373, "Manual 6-Speed", 13.6, 179, 110000000, "BYBRE Single Disc ABS");

    cout << "==========================================================================" << endl;
    cout << "                   SISTEM DATA MOTOR SPORT                                " << endl;
    cout << "==========================================================================" << endl;

    // Tampilkan 5 data awal
    cout << "\n[ DATA AWAL ]" << endl;
    cetakTabelDinamis(daftarMotor, jumlahData);

    // Menerima Input Baru dari User tanpa teks prompt
    int id, tahun, mesin, speed;
    double tangki, harga;
    string merk, transmisi, rem;

    cin >> id; cin.ignore();
    getline(cin, merk);
    cin >> tahun;
    cin >> mesin; cin.ignore();
    getline(cin, transmisi);
    cin >> tangki;
    cin >> speed;
    cin >> harga; cin.ignore();
    getline(cin, rem);

    // Tambahkan objek baru ke array
    daftarMotor[jumlahData++] = MotorSport(id, merk, tahun, mesin, transmisi, tangki, speed, harga, rem);

    // Menampilkan kembali seluruh data setelah penambahan
    cout << "\n[ DATA SETELAH PENAMBAHAN ]" << endl;
    cetakTabelDinamis(daftarMotor, jumlahData);

    return 0;
}