import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    private static void printGaris(int[] widths) {
        System.out.print("+");
        for (int w : widths) {
            for (int i = 0; i < w + 2; i++) System.out.print("-");
            System.out.print("+");
        }
        System.out.println();
    }

    public static void cetakTabelDinamis(ArrayList<MotorSport> daftar) {
        String[] headers = {"ID", "MERK", "TAHUN", "MESIN (cc)", "TRANSMISI", "TANGKI (L)", "MAX SPEED", "HARGA (RP)", "PENGEREMAN"};
        int[] colWidths = new int[headers.length];

        for (int i = 0; i < headers.length; i++) {
            colWidths[i] = headers[i].length();
        }

        for (MotorSport m : daftar) {
            colWidths[0] = Math.max(colWidths[0], String.valueOf(m.getId()).length());
            colWidths[1] = Math.max(colWidths[1], m.getMerk().length());
            colWidths[2] = Math.max(colWidths[2], String.valueOf(m.getTahun()).length());
            colWidths[3] = Math.max(colWidths[3], String.valueOf(m.getKapasitasMesin()).length());
            colWidths[4] = Math.max(colWidths[4], m.getJenisTransmisi().length());
            colWidths[5] = Math.max(colWidths[5], String.format("%.1f", m.getKapasitasTangki()).length());
            colWidths[6] = Math.max(colWidths[6], (m.getKecepatanMaksimal() + " km/h").length());
            colWidths[7] = Math.max(colWidths[7], String.format("%.0f", m.getHarga()).length());
            colWidths[8] = Math.max(colWidths[8], m.getSistemPengereman().length());
        }

        printGaris(colWidths);
        System.out.print("|");
        for (int i = 0; i < headers.length; i++) {
            System.out.printf(" %-" + colWidths[i] + "s |", headers[i]);
        }
        System.out.println();
        printGaris(colWidths);

        for (MotorSport m : daftar) {
            System.out.printf("| %-" + colWidths[0] + "d | %-" + colWidths[1] + "s | %-" + colWidths[2] + "d | %-" + colWidths[3] + "d | %-" + colWidths[4] + "s | %-" + colWidths[5] + "s | %-" + colWidths[6] + "s | %-" + colWidths[7] + "s | %-" + colWidths[8] + "s |\n",
                    m.getId(),
                    m.getMerk(),
                    m.getTahun(),
                    m.getKapasitasMesin(),
                    m.getJenisTransmisi(),
                    String.format("%.1f", m.getKapasitasTangki()),
                    m.getKecepatanMaksimal() + " km/h",
                    String.format("%.0f", m.getHarga()),
                    m.getSistemPengereman());
        }
        printGaris(colWidths);
    }

    public static void main(String[] args) {
        ArrayList<MotorSport> daftarMotor = new ArrayList<>();
        Scanner scanner = new Scanner(System.in);

        // 5 Objek Awal
        daftarMotor.add(new MotorSport(1, "Kawasaki ZX-25R", 2023, 250, "Manual 6-Speed", 15.0, 187, 105000000, "Dual Disc ABS"));
        daftarMotor.add(new MotorSport(2, "Yamaha YZF-R6", 2022, 599, "Manual 6-Speed", 17.0, 257, 270000000, "Dual Disc ABS"));
        daftarMotor.add(new MotorSport(3, "Honda CBR1000RR-R", 2024, 999, "Manual 6-Speed", 16.1, 299, 1076000000, "Brembo Dual Disc ABS"));
        daftarMotor.add(new MotorSport(4, "Ducati Panigale V4", 2023, 1103, "Manual 6-Speed", 16.0, 300, 799000000, "Brembo Stylema ABS"));
        daftarMotor.add(new MotorSport(5, "KTM RC 390", 2022, 373, "Manual 6-Speed", 13.6, 179, 110000000, "BYBRE Single Disc ABS"));

        System.out.println("==========================================================================");
        System.out.println("                   SISTEM DATA MOTOR SPORT                                ");
        System.out.println("==========================================================================");

        System.out.println("\n[ DATA AWAL SISTEM (5 OBJEK) ]");
        cetakTabelDinamis(daftarMotor);

        // Input Data Tanpa Teks Prompt
        int id = scanner.nextInt();
        scanner.nextLine();
        String merk = scanner.nextLine();
        int tahun = scanner.nextInt();
        int mesin = scanner.nextInt();
        scanner.nextLine();
        String transmisi = scanner.nextLine();
        double tangki = scanner.nextDouble();
        int speed = scanner.nextInt();
        double harga = scanner.nextDouble();
        scanner.nextLine();
        String rem = scanner.nextLine();

        daftarMotor.add(new MotorSport(id, merk, tahun, mesin, transmisi, tangki, speed, harga, rem));

        System.out.println("\n[ DATA SETELAH PENAMBAHAN ]");
        cetakTabelDinamis(daftarMotor);

        scanner.close();
    }
}