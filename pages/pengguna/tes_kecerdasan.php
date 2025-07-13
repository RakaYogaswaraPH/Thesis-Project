<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
$pengguna = getPenggunaById($_SESSION['pengguna']['id']);

/**
 * Fungsi untuk mengambil soal dan jawaban dari database
 */
function getSoalCPI($connect)
{
    $sql = "SELECT s.id AS soal_id, s.kriteria, s.pertanyaan, j.id AS jawaban_id, j.jawaban, j.nilai_konversi
            FROM soal_cpi s
            JOIN jawaban_cpi j ON s.id = j.soal_id
            ORDER BY s.id ASC";

    $result = $connect->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['soal_id']]['pertanyaan'] = $row['pertanyaan'];
            $data[$row['soal_id']]['kriteria'] = $row['kriteria'];
            $data[$row['soal_id']]['jawaban'][] = [
                'id' => $row['jawaban_id'],
                'text' => $row['jawaban'],
                'nilai' => $row['nilai_konversi']
            ];
        }
    }
    return $data;
}

$soal_data = getSoalCPI($connect);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Tes Kecerdasan</title>
    <link rel="stylesheet" href="../../src/styles/style.css">
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[poppins] text-gray-800 overflow-x-hidden bg-secondary-400">
    <?php include '../../components/user/navbar.php'; ?>
    <?php include '../../components/mobileNavbar.php'; ?>

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Tes Kecerdasan Anak Usia Dini</h1>
                <span class="text-sm text-gray-500">Durasi: ±5 menit</span>
            </div>

            <div class="mb-6">
                <p class="text-gray-600 text-base mb-4">Jawablah setiap pertanyaan di bawah ini dengan jujur. Pilih satu jawaban yang paling sesuai.</p>
            </div>

            <!-- Menampilkan Soal dari Database -->
            <form action="hasil_tes.php" method="post" class="space-y-8">
                <?php $no = 1;
                foreach ($soal_data as $soal_id => $soal): ?>
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-6 border border-emerald-200">
                        <h3 class="font-semibold text-gray-800 mb-4"><?= $no++ ?>. <?= htmlspecialchars($soal['pertanyaan']) ?></h3>
                        <div class="space-y-3">
                            <?php foreach ($soal['jawaban'] as $jawaban): ?>
                                <label class="flex items-center space-x-3">
                                    <input type="radio" name="jawaban[<?= $soal_id ?>]" value="<?= $jawaban['nilai'] ?>" required class="text-emerald-600">
                                    <span><?= htmlspecialchars($jawaban['text']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        Selesai Tes
                        <i class="fa-solid fa-check ml-2"></i>
                    </button>
                </div>
            </form>
        </div>

        <footer class="text-center mt-12 text-white/80 text-sm">
            <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
        </footer>
    </div>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>