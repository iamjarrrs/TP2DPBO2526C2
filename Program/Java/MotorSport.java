// Subclass dari Motor (Mengimplementasikan Multilevel Inheritance)
public class MotorSport extends Motor {
    // Atribut spesifik untuk jenis MotorSport
    private int kecepatanMaksimal;  // Kecepatan puncak dalam km/h
    private double harga;            // Harga kendaraan dalam Rupiah
    private String sistemPengereman; // Contoh: ABS, Dual Disc, Brembo, dll.

    // Constructor memanggil constructor milik kelas Motor
    public MotorSport(int id, String merk, int tahun, int kapasitasMesin, String jenisTransmisi, double kapasitasTangki, int kecepatanMaksimal, double harga, String sistemPengereman) {
        super(id, merk, tahun, kapasitasMesin, jenisTransmisi, kapasitasTangki);
        this.kecepatanMaksimal = kecepatanMaksimal;
        this.harga = harga;
        this.sistemPengereman = sistemPengereman;
    }

    // Getter dan Setter untuk Kecepatan Maksimal
    public void setKecepatanMaksimal(int kecepatanMaksimal) { this.kecepatanMaksimal = kecepatanMaksimal; }
    public int getKecepatanMaksimal() { return kecepatanMaksimal; }

    // Getter dan Setter untuk Harga
    public void setHarga(double harga) { this.harga = harga; }
    public double getHarga() { return harga; }

    // Getter dan Setter untuk Sistem Pengereman
    public void setSistemPengereman(String sistemPengereman) { this.sistemPengereman = sistemPengereman; }
    public String getSistemPengereman() { return sistemPengereman; }
}