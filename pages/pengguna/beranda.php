<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
function getRiwayatTesByUserId(mysqli $conn, int $user_id): array
{
    $sql = "SELECT nilai_cpi, tipe_kecerdasan, tanggal_tes 
            FROM hasil_cpi 
            WHERE user_id = ? 
            ORDER BY tanggal_tes DESC 
            LIMIT 2";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $riwayat = [];
    while ($row = $result->fetch_assoc()) {
        $riwayat[] = $row;
    }

    return $riwayat;
}

function getStatistikTes($connect, $user_id)
{
    $query = "SELECT 
                COUNT(*) AS total_tes,
                ROUND(AVG(nilai_cpi), 0) AS rata_rata_nilai,
                tipe_kecerdasan
            FROM hasil_cpi
            WHERE user_id = ?
            GROUP BY tipe_kecerdasan
            ORDER BY COUNT(*) DESC
            LIMIT 1";

    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [
        'total' => 0,
        'rata_rata' => 0,
        'tipe_terbanyak' => 'Belum Ada'
    ];

    if ($row = $result->fetch_assoc()) {
        $data['total'] = (int)$row['total_tes'];
        $data['rata_rata'] = (int)$row['rata_rata_nilai'];
        $data['tipe_terbanyak'] = $row['tipe_kecerdasan'];
    }

    return $data;
}

$pengguna = getPenggunaById($_SESSION['pengguna']['id']);
$statistik = getStatistikTes($connect, $pengguna['user_id']);
$riwayatTes = getRiwayatTesByUserId($connect, $_SESSION['pengguna']['id']);
$greeting = getGreeting();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Beranda</title>
    <link rel="stylesheet" href="../../src/styles/style.css">
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>


<body class="font-[poppins] text-gray-800 overflow-x-hidden bg-secondary-400">
    <!-- Navbar -->
    <?php include '../../components/user/navbar.php'; ?>
    <!-- End Of Navbar -->

    <!-- Mobile Bottom Navigation -->
    <?php include '../../components/user/mobileNavbar.php'; ?>
    <!-- End Of Mobile Navbar -->

    <div class="container mx-auto px-4 py-8 ">
        <!-- Header -->
        <div class="text-left mb-10">
            <h1 class="text-3xl font-bold text-white mb-4">
                <?= $greeting ?> <?= htmlspecialchars($pengguna['nama_anak']) ?> !
            </h1>
            <p class="text-xl text-white/90 font-medium">
                Semoga aktivitas belajarmu menyenangkan.
            </p>
        </div>

        <!-- Status Tes Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 mb-8 border border-white/20">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-xl mr-4">
                    <i class="fa-solid fa-lightbulb text-emerald-600 text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Tes Kecerdasan</h2>
            </div>

            <div class="mb-6">
                <p class="text-gray-600 mb-4">Siap untuk mencoba?</p>
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 border-l-4 border-emerald-500">
                    <p class="text-gray-700 font-medium">Tes Kecerdasan Anak Usia PAUD</p>
                    <p class="text-sm text-gray-600 mt-1">Durasi: 5 menit • 15 soal </p>
                </div>
            </div>

            <button class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2">
                <span>Mulai Tes Sekarang</span>
                <i class="fa-solid fa-arrow-right text-white text-base"></i>
            </button>

        </div>

        <!-- Grid Layout for Cards -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Statistik Tes -->
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 p-3 rounded-xl mr-4">
                        <i class="fa-solid fa-chart-column text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Statistik Tes</h3>
                </div>

                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700">Tes Diselesaikan:</span>
                            <span class="font-bold text-blue-600"><?= $statistik['total'] ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700">Rata-rata Skor:</span>
                            <span class="font-bold text-blue-600"><?= $statistik['rata_rata'] ?> IQ</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700">Kecerdasan Dominan:</span>
                            <span class="font-bold text-blue-600"><?= htmlspecialchars($statistik['tipe_terbanyak']) ?></span>
                        </div>
                    </div>
                </div>

                <a href="riwayat_tes.php" class="w-full mt-6 bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-xl text-center block transition-colors duration-200">
                    Lihat Statistik
                </a>
            </div>

            <!-- Riwayat Tes -->
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="bg-purple-100 p-3 rounded-xl mr-4">
                        <i class="fa-solid fa-clock text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Riwayat Tes</h3>
                </div>

                <div class="space-y-4">
                    <?php if (count($riwayatTes) > 0): ?>
                        <?php foreach ($riwayatTes as $tes): ?>
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-100">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="font-medium text-gray-800"><?= htmlspecialchars($tes['tipe_kecerdasan']) ?></span>
                                    <span class="text-sm text-purple-600 font-semibold">Selesai</span>
                                </div>
                                <p class="text-sm text-gray-600">
                                    Skor: <?= round($tes['nilai_cpi']) ?> •
                                    Tanggal: <?= date('d M Y', strtotime($tes['tanggal_tes'])) ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-600 text-sm">Belum ada riwayat tes yang tersedia.</p>
                    <?php endif; ?>
                </div>


                <a href="riwayat_tes.php"><button class="w-full mt-6 bg-purple-500 hover:bg-purple-600 text-white font-medium py-3 px-6 rounded-xl transition-colors duration-200">
                        Lihat Semua Riwayat
                    </button></a>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-12 bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Mengapa Tes Kecerdasan Penting?</h3>
                <div class="grid md:grid-cols-3 gap-6 mt-8">
                    <div class="text-center">
                        <div class="bg-green-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Kenali Potensi Diri</h4>
                        <p class="text-sm text-gray-600">Temukan kekuatan kognitif Anda dan area yang perlu dikembangkan</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-orange-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Tingkatkan Kemampuan</h4>
                        <p class="text-sm text-gray-600">Dapatkan insight untuk mengoptimalkan performa mental Anda</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-indigo-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Hasil Akurat</h4>
                        <p class="text-sm text-gray-600">Tes yang telah divalidasi secara ilmiah dengan standar internasional</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-12 text-white/80 text-sm">
            <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
        </footer>
    </div>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>