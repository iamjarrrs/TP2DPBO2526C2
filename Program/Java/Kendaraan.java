// Base Class
public  class Kendaraan{
    // Atribut dasar kendaraan
    private int id;
    private String merk;
    private int tahun;

    // Constructor
    public Kendaraan(int id, String merk, int tahun){
        this.id = id;
        this.merk = merk;
        this.tahun = tahun;
    }

    // Setter dan Getter id
    public void setId(int id) {this.id = id;}
    public int getId(){return id;}

    // Setter dan Getter merk
    public void setMerk(String merk){this.merk = merk;}
    public String getMerk(){return merk;}

    // Setter dan Getter tahun
    public void setTahun(int tahun){this.tahun = tahun;}
    public int getTahun(){return this.tahun;}
}