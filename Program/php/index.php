<?php
require_once "MotorSport.php";
session_start();

// Inisialisasi 5 Objek Awal ke dalam Session jika belum ada
if (!isset($_SESSION['daftar_motor'])) {
    $_SESSION['daftar_motor'] = [
        new MotorSport(1, "Kawasaki ZX-25R", 2023, "zx25r.webp", 250, "Manual 6-Speed", 15.0, 187, 105000000, "Dual Disc ABS"),
        new MotorSport(2, "Yamaha YZF-R6", 2022, "r6.webp", 599, "Manual 6-Speed", 17.0, 257, 270000000, "Dual Disc ABS"),
        new MotorSport(3, "Honda CBR1000RR-R", 2024, "cbr1000.webp", 999, "Manual 6-Speed", 16.1, 299, 1076000000, "Brembo Dual Disc ABS"),
        new MotorSport(4, "Ducati Panigale V4", 2023, "panigale.webp", 1103, "Manual 6-Speed", 16.0, 300, 799000000, "Brembo Stylema ABS"),
        new MotorSport(5, "KTM RC 390", 2022, "rc390.webp", 373, "Manual 6-Speed", 13.6, 179, 110000000, "BYBRE Single Disc ABS")
    ];
}

// Proses Tambah Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $merk = $_POST['merk'];
    $tahun = (int)$_POST['tahun'];
    $mesin = (int)$_POST['mesin'];
    $transmisi = $_POST['transmisi'];
    $tangki = (float)$_POST['tangki'];
    $speed = (int)$_POST['speed'];
    $harga = (float)$_POST['harga'];
    $rem = $_POST['rem'];

    // Penanganan Upload Gambar
    $fotoNama = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $fotoNama = time() . '_' . uniqid() . '.' . $ext;
        
        if (!is_dir('img')) {
            mkdir('img', 0777, true);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $fotoNama);
    }

    // Tambahkan Objek Baru ke Session
    $_SESSION['daftar_motor'][] = new MotorSport($id, $merk, $tahun, $fotoNama, $mesin, $transmisi, $tangki, $speed, $harga, $rem);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Motor Sport</title>
    <style>
        /* Reset & Base Layout */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a192f 0%, #112240 50%, #1b2a4a 100%);
            background-attachment: fixed;
            color: #e6f1ff;
            padding: 30px;
            min-height: 100vh;
        }

        /* Header Judul di Tengah */
        .main-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #64ffda;
            text-shadow: 0 0 10px rgba(100, 255, 218, 0.3);
            letter-spacing: 1.5px;
        }

        /* Layout Grid 70% (Tabel) - 30% (Form) */
        .content-wrapper {
            display: grid;
            grid-template-columns: 68% 29%;
            gap: 3%;
            align-items: start;
            width: 100%;
        }

        /* Glassmorphism Panel */
        .glass-panel {
            background: rgba(16, 33, 65, 0.55);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(100, 255, 218, 0.15);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .panel-title {
            font-size: 1.3rem;
            color: #e6f1ff;
            margin-bottom: 15px;
            border-bottom: 2px solid rgba(100, 255, 218, 0.3);
            padding-bottom: 8px;
        }

        /* Table Area (70%) */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        th {
            background: rgba(100, 255, 218, 0.1);
            color: #64ffda;
            padding: 12px 8px;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid rgba(100, 255, 218, 0.2);
            white-space: nowrap;
        }

        td {
            padding: 10px 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .img-thumb {
            width: 65px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid rgba(100, 255, 218, 0.3);
            display: block;
        }

        .no-img {
            color: #8892b0;
            font-size: 0.8rem;
            font-style: italic;
        }

        /* Form Area (30%) */
        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            display: block;
            font-size: 0.82rem;
            color: #8892b0;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            background: rgba(10, 25, 47, 0.7);
            border: 1px solid rgba(100, 255, 218, 0.2);
            border-radius: 6px;
            color: #e6f1ff;
            font-size: 0.88rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #64ffda;
            box-shadow: 0 0 8px rgba(100, 255, 218, 0.3);
        }

        input[type="file"]::file-selector-button {
            background: rgba(100, 255, 218, 0.1);
            border: 1px solid #64ffda;
            color: #64ffda;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.75rem;
            margin-right: 8px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background: #64ffda;
            color: #0a192f;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #4cd8b2;
            box-shadow: 0 0 15px rgba(100, 255, 218, 0.4);
        }
    </style>
</head>
<body>

    <!-- Judul Utama di Tengah -->
    <h1 class="main-title">SISTEM DATA MOTOR SPORT</h1>

    <!-- Container Utama Dua Kolom Bersampingan -->
    <div class="content-wrapper">
        <!-- Kolom Kiri: Tabel Data (~70%) -->
        <div class="glass-panel">
            <h2 class="panel-title">Daftar Motor Sport</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Merk</th>
                            <th>Tahun</th>
                            <th>Mesin</th>
                            <th>Transmisi</th>
                            <th>Tangki</th>
                            <th>Max Speed</th>
                            <th>Harga (Rp)</th>
                            <th>Pengereman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['daftar_motor'] as $m): ?>
                            <tr>
                                <td><?= $m->getId(); ?></td>
                                <td>
                                    <?php 
                                        $fotoName = $m->getFoto();
                                        $absolutePath = __DIR__ . '/img/' . $fotoName;
                                        $relativePath = 'img/' . $fotoName;

                                        if (!empty($fotoName) && file_exists($absolutePath)): 
                                    ?>
                                        <img src="<?= $relativePath; ?>" class="img-thumb" alt="<?= htmlspecialchars($m->getMerk()); ?>">
                                    <?php else: ?>
                                        <span class="no-img">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><strong><?= htmlspecialchars($m->getMerk()); ?></strong></td>
                                <td><?= $m->getTahun(); ?></td>
                                <td><?= $m->getKapasitasMesin(); ?> cc</td>
                                <td><?= htmlspecialchars($m->getJenisTransmisi()); ?></td>
                                <td><?= number_format($m->getKapasitasTangki(), 1); ?> L</td>
                                <td><?= $m->getKecepatanMaksimal(); ?> km/h</td>
                                <td><?= number_format($m->getHarga(), 0, ',', '.'); ?></td>
                                <td><?= htmlspecialchars($m->getSistemPengereman()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Kolom Kanan: Form Input Data (~30%) -->
        <div class="glass-panel">
            <h2 class="panel-title">Tambah Data Motor</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID Kendaraan</label>
                    <input type="number" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Merk Motor</label>
                    <input type="text" name="merk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tahun Rilis</label>
                    <input type="number" name="tahun" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto Kendaraan</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Kapasitas Mesin (cc)</label>
                    <input type="number" name="mesin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sistem Transmisi</label>
                    <input type="text" name="transmisi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kapasitas Tangki (L)</label>
                    <input type="number" step="0.1" name="tangki" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kecepatan Max (km/h)</label>
                    <input type="number" name="speed" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sistem Pengereman</label>
                    <input type="text" name="rem" class="form-control" required>
                </div>
                <button type="submit" class="btn-submit">Tambah Data</button>
            </form>
        </div>
    </div>

</body>
</html>