// Subclass dari kendaraan (Inheritance)
public class Motor extends Kendaraan{
    // Atribut motor
    private int kapasitasMesin; // kapasitas mesin dalam cc
    private String jenisTransmisi; // manual/otomatis
    private double kapasitasTangki; // kapasitas tangki bensin dalam Liter

    // Constructor
    public Motor (int id, String merk, int tahun, int kapasitasMesin, String jenisTransmisi, double kapasitasTangki){
        super(id, merk, tahun);
        this.kapasitasMesin = kapasitasMesin;
        this.jenisTransmisi = jenisTransmisi;
        this.kapasitasTangki = kapasitasTangki;
    }

    // Setter dan Getter Kapasitas Mesin
    public void setKapasitasMesin(int kapasitasMesin){this.kapasitasMesin = kapasitasMesin;}
    public int getKapasitasMesin(){return this.kapasitasMesin;}

    // Setter dan Getter jenis transmisi
    public void setJenisTransmisi(String jenisTransmisi){this.jenisTransmisi = jenisTransmisi;}
    public String getJenisTransmisi(){return this.jenisTransmisi;}

    // setter dan getter kapasitas tangki
    public void setKapasitasTangki(double kapasitasTangki){this.kapasitasTangki = kapasitasTangki;}
    public double getKapasitasTangki(){return this.kapasitasTangki;}

}
