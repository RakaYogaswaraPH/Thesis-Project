<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
$pengguna = getPenggunaById($_SESSION['pengguna']['id']);

/** Ambil semua data soal (id dan kriteria) */
function fetchSoalWithKriteria(mysqli $connect): array {
    $sql = "SELECT id, kriteria FROM soal_cpi";
    $result = $connect->query($sql);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[$row['id']] = $row['kriteria'];
    }
    return $data;
}

/** Fungsi kategori IQ */
function kategoriIQ($cpi) {
    if ($cpi >= 150) return "Superior";
    if ($cpi >= 135) return "Di Atas Rata-rata";
    if ($cpi >= 120) return "Rata-rata (Normal)";
    if ($cpi >= 110) return "Di Bawah Rata-rata";
    return "Memerlukan Dukungan Tambahan";
}

/** Fungsi tipe anak */
function tipeAnak($nilai_kriteria) {
    if (empty($nilai_kriteria)) return "Tidak Terdefinisi";
    arsort($nilai_kriteria);
    $top = key($nilai_kriteria);

    switch ($top) {
        case 'Visual-Spasial':
            return 'Si Imajinatif';
        case 'Linguistik':
            return 'Si Pencerita';
        case 'Pemecahan Masalah':
            return 'Si Cerdik';
        case 'Logika-Matematika':
            return 'Si Logis Kecil';
        default:
            return 'Memerlukan Dukungan Tambahan';
    }
}


// Jawaban dari form
$jawaban_user = $_POST['jawaban'] ?? [];
if (empty($jawaban_user)) {
    echo "Belum ada jawaban yang dipilih."; exit;
}

// Ambil kriteria untuk setiap soal
$map_soal = fetchSoalWithKriteria($connect);

// Bobot per kriteria
$bobot = [
    'Logika-Matematika' => 0.3,
    'Linguistik' => 0.25,
    'Pemecahan Masalah' => 0.25,
    'Visual-Spasial' => 0.2
];

// Hitung nilai per kriteria
$nilai_per_kriteria = [];
$jumlah_soal_per_kriteria = [];
foreach ($jawaban_user as $soal_id => $nilai_konversi) {
    $kriteria = $map_soal[$soal_id];
    $nilai_per_kriteria[$kriteria] = ($nilai_per_kriteria[$kriteria] ?? 0) + (int)$nilai_konversi;
    $jumlah_soal_per_kriteria[$kriteria] = ($jumlah_soal_per_kriteria[$kriteria] ?? 0) + 1;
}

// Hitung sub index dan total CPI
$sub_index = [];
$total_cpi = 0;
foreach ($nilai_per_kriteria as $kriteria => $total_nilai) {
    $rata2 = $total_nilai / $jumlah_soal_per_kriteria[$kriteria];
    $sub_index[$kriteria] = $rata2 * $bobot[$kriteria];
    $total_cpi += $sub_index[$kriteria];
}
$total_cpi = round($total_cpi * 30, 0);

// Kategori dan tipe
$kategori_iq = kategoriIQ($total_cpi);
$tipe_kecerdasan = tipeAnak($sub_index);

// Simpan hasil ke database
$user_id = $_SESSION['pengguna']['id'];
$stmt = $connect->prepare("INSERT INTO hasil_cpi (user_id, nilai_cpi, kategori_iq, tipe_kecerdasan) VALUES (?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("idss", $user_id, $total_cpi, $kategori_iq, $tipe_kecerdasan);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes Kecerdasan | PPMH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/styles/style.css">
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[poppins] text-gray-800 bg-secondary-400">
    <?php include '../../components/user/navbar.php'; ?>
    <?php include '../../components/mobileNavbar.php'; ?>

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-emerald-600">Hasil Tes CPI</h1>
                <p class="text-gray-600 mt-2">Berikut ringkasan hasil tes Anda.</p>
            </div>

            <div class="space-y-5">
                <?php foreach ($sub_index as $kriteria => $nilai): ?>
                    <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-lg">
                        <h2 class="font-semibold text-lg text-emerald-800"><?= $kriteria ?></h2>
                        <p class="text-gray-700">Nilai Sub-Index: <span class="font-bold"><?= round($nilai, 2) ?></span></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 bg-emerald-100 border border-emerald-300 p-4 rounded-lg text-center">
                <h2 class="text-xl font-semibold text-emerald-700">Total Skor CPI: <span class="font-bold"><?= $total_cpi ?></span></h2>
                <p class="text-gray-600 mt-1">Kategori IQ: <span class="font-semibold"><?= $kategori_iq ?></span></p>
                <p class="text-gray-600">Tipe Anak: <span class="italic font-medium"><?= $tipe_kecerdasan ?></span></p>
            </div>

            <div class="text-center mt-10">
                <a href="tes_kecerdasan.php" class="inline-block bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                    Coba Tes Lagi <i class="fa-solid fa-rotate-right ml-2"></i>
                </a>
            </div>
        </div>

        <footer class="text-center mt-12 text-white/80 text-sm">
            <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
