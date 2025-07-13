<?php
include './config/config.php';
session_start();
$_SESSION['user_id'] = 18; // contoh ID pengguna yang ada


$conn = new mysqli("localhost", "root", "", "db_ppmh");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$jawaban = $_POST['jawaban'] ?? [];

if (empty($jawaban)) {
    echo "Belum ada jawaban yang dipilih.";
    exit;
}

// Ambil data soal dan kriteria untuk mapping nilai -> kriteria
$soal_query = "SELECT id, kriteria FROM soal_cpi";
$soal_result = $conn->query($soal_query);

$map_soal = [];
while ($row = $soal_result->fetch_assoc()) {
    $map_soal[$row['id']] = $row['kriteria'];
}

// Bobot per kriteria
$bobot = [
    'Logika-Matematika' => 0.3,
    'Linguistik' => 0.25,
    'Pemecahan Masalah' => 0.25,
    'Visual-Spasial' => 0.2
];

// Hitung total nilai per kriteria
$nilai_per_kriteria = [];
$jumlah_soal_per_kriteria = [];

foreach ($jawaban as $soal_id => $nilai_konversi) {
    $kriteria = $map_soal[$soal_id];
    if (!isset($nilai_per_kriteria[$kriteria])) {
        $nilai_per_kriteria[$kriteria] = 0;
        $jumlah_soal_per_kriteria[$kriteria] = 0;
    }
    $nilai_per_kriteria[$kriteria] += (int)$nilai_konversi;
    $jumlah_soal_per_kriteria[$kriteria]++;
}

// Hitung CPI per kriteria dan total CPI
$sub_index = [];
$total_cpi = 0;

foreach ($nilai_per_kriteria as $kriteria => $total_nilai) {
    $rata2 = $total_nilai / $jumlah_soal_per_kriteria[$kriteria];
    $sub_index[$kriteria] = $rata2 * $bobot[$kriteria];
    $total_cpi += $sub_index[$kriteria];
}

$total_cpi = round($total_cpi * 30, 0); // Skala jadi 150 maksimum


// Fungsi kategori IQ
function kategoriIQ($cpi)
{
    if ($cpi >= 150) return "Superior";
    if ($cpi >= 135) return "Di Atas Rata-rata";
    if ($cpi >= 120) return "Rata-rata (Normal)";
    if ($cpi >= 110) return "Di Bawah Rata-rata";
    return "Memerlukan Dukungan Tambahan";
}

// Fungsi tipe anak
function tipeAnak($nilai_kriteria)
{
    if (empty($nilai_kriteria)) return "Tidak Terdefinisi";
    arsort($nilai_kriteria);
    reset($nilai_kriteria);
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


$kategori_iq = kategoriIQ($total_cpi);
$tipe = tipeAnak($sub_index);

// 🔥 Tambahkan ini:
$user_id = $_SESSION['user_id']; // ambil dari session

// Simpan hasil ke database
$stmt = $conn->prepare("INSERT INTO hasil_cpi (user_id, nilai_cpi, kategori_iq, tipe_kecerdasan) VALUES (?, ?, ?, ?)");


if (!$stmt) {
    die("Prepare statement gagal: " . $conn->error);
}

$stmt->bind_param("idss", $user_id, $total_cpi, $kategori_iq, $tipe);

if (!$stmt->execute()) {
    die("Eksekusi query gagal: " . $stmt->error);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hasil Tes CPI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold mb-4">Hasil Tes Kecerdasan</h1>
        <p class="text-lg">Nilai CPI: <strong><?= $total_cpi ?></strong></p>
        <p class="text-lg">Kategori IQ: <strong><?= $kategori_iq ?></strong></p>
        <p class="text-lg">Tipe Anak: <strong><?= $tipe ?></strong></p>

        <?php if ($kategori_iq === "Memerlukan Dukungan Tambahan"): ?>
            <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded">
                Anak telah menunjukkan perkembangan, namun masih memerlukan <strong>dukungan tambahan</strong> untuk mengoptimalkan potensi kecerdasannya.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>