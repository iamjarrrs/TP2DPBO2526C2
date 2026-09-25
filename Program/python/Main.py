from MotorSport import MotorSport

def print_garis(widths):
    line = "+"
    for w in widths:
        line += "-" * (w + 2) + "+"
    print(line)

def cetak_tabel_dinamis(daftar_motor):
    headers = ["ID", "MERK", "TAHUN", "MESIN (cc)", "TRANSMISI", "TANGKI (L)", "MAX SPEED", "HARGA (RP)", "PENGEREMAN"]
    col_widths = [len(h) for h in headers]

    for m in daftar_motor:
        col_widths[0] = max(col_widths[0], len(str(m.get_id())))
        col_widths[1] = max(col_widths[1], len(m.get_merk()))
        col_widths[2] = max(col_widths[2], len(str(m.get_tahun())))
        col_widths[3] = max(col_widths[3], len(str(m.get_kapasitas_mesin())))
        col_widths[4] = max(col_widths[4], len(m.get_jenis_transmisi()))
        col_widths[5] = max(col_widths[5], len(f"{m.get_kapasitas_tangki():.1f}"))
        col_widths[6] = max(col_widths[6], len(f"{m.get_kecepatan_maksimal()} km/h"))
        col_widths[7] = max(col_widths[7], len(f"{m.get_harga():.0f}"))
        col_widths[8] = max(col_widths[8], len(m.get_sistem_pengereman()))

    print_garis(col_widths)
    header_row = "|"
    for i, h in enumerate(headers):
        header_row += f" {h:<{col_widths[i]}} |"
    print(header_row)
    print_garis(col_widths)

    for m in daftar_motor:
        str_id = str(m.get_id())
        str_merk = m.get_merk()
        str_tahun = str(m.get_tahun())
        str_mesin = str(m.get_kapasitas_mesin())
        str_transmisi = m.get_jenis_transmisi()
        str_tangki = f"{m.get_kapasitas_tangki():.1f}"
        str_speed = f"{m.get_kecepatan_maksimal()} km/h"
        str_harga = f"{m.get_harga():.0f}"
        str_rem = m.get_sistem_pengereman()

        row = f"| {str_id:<{col_widths[0]}} " \
              f"| {str_merk:<{col_widths[1]}} " \
              f"| {str_tahun:<{col_widths[2]}} " \
              f"| {str_mesin:<{col_widths[3]}} " \
              f"| {str_transmisi:<{col_widths[4]}} " \
              f"| {str_tangki:<{col_widths[5]}} " \
              f"| {str_speed:<{col_widths[6]}} " \
              f"| {str_harga:<{col_widths[7]}} " \
              f"| {str_rem:<{col_widths[8]}} |"
        print(row)

    print_garis(col_widths)

def main():
    daftar_motor = []

    # 5 Objek Awal
    daftar_motor.append(MotorSport(1, "Kawasaki ZX-25R", 2023, 250, "Manual 6-Speed", 15.0, 187, 105000000, "Dual Disc ABS"))
    daftar_motor.append(MotorSport(2, "Yamaha YZF-R6", 2022, 599, "Manual 6-Speed", 17.0, 257, 270000000, "Dual Disc ABS"))
    daftar_motor.append(MotorSport(3, "Honda CBR1000RR-R", 2024, 999, "Manual 6-Speed", 16.1, 299, 1076000000, "Brembo Dual Disc ABS"))
    daftar_motor.append(MotorSport(4, "Ducati Panigale V4", 2023, 1103, "Manual 6-Speed", 16.0, 300, 799000000, "Brembo Stylema ABS"))
    daftar_motor.append(MotorSport(5, "KTM RC 390", 2022, 373, "Manual 6-Speed", 13.6, 179, 110000000, "BYBRE Single Disc ABS"))

    print("==========================================================================")
    print("                   SISTEM DATA MOTOR SPORT                                ")
    print("==========================================================================")

    print("\n[ DATA AWAL SISTEM (5 OBJEK) ]")
    cetak_tabel_dinamis(daftar_motor)

    # Input Data Tanpa Teks Prompt (Passing empty string)
    id_k = int(input())
    merk = input()
    tahun = int(input())
    mesin = int(input())
    transmisi = input()
    tangki = float(input())
    speed = int(input())
    harga = float(input())
    rem = input()

    daftar_motor.append(MotorSport(id_k, merk, tahun, mesin, transmisi, tangki, speed, harga, rem))

    print("\n[ DATA SETELAH PENAMBAHAN ]")
    cetak_tabel_dinamis(daftar_motor)

if __name__ == "__main__":
    main()