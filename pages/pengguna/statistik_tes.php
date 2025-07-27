<?php
include '../../config/config.php';
session_start();

if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}

$pengguna = getPenggunaById($_SESSION['pengguna']['id']);
$user_id = $pengguna['user_id'];

/**
 * Ambil riwayat tes CPI berdasarkan user_id
 */
function getRiwayatTesByUserId(mysqli $connect, int $userId): array
{
    $sql = "SELECT nilai_cpi, kategori_iq, tipe_kecerdasan, tanggal_tes 
            FROM hasil_cpi 
            WHERE user_id = ? 
            ORDER BY tanggal_tes DESC";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $riwayat = [];
    while ($row = $result->fetch_assoc()) {
        $riwayat[] = $row;
    }
    return $riwayat;
}

/**
 * Hitung statistik dari riwayat tes
 */
function hitungStatistikTes(array $riwayatTes): array
{
    $totalTes = count($riwayatTes);
    $nilaiTotal = 0;
    $nilaiTertinggi = 0;
    $tipeCount = [];

    foreach ($riwayatTes as $tes) {
        $nilai = $tes['nilai_cpi'];
        $nilaiTotal += $nilai;
        if ($nilai > $nilaiTertinggi) {
            $nilaiTertinggi = $nilai;
        }
        $tipe = $tes['tipe_kecerdasan'];
        $tipeCount[$tipe] = ($tipeCount[$tipe] ?? 0) + 1;
    }

    $rataRata = $totalTes > 0 ? round($nilaiTotal / $totalTes, 2) : 0;
    arsort($tipeCount);
    $tipePalingSering = $totalTes > 0 ? array_key_first($tipeCount) : '-';

    return [
        'total_tes' => $totalTes,
        'rata_rata' => $rataRata,
        'tertinggi' => $nilaiTertinggi,
        'tipe_terbanyak' => $tipePalingSering
    ];
}

// ✅ Eksekusi
$riwayatTes = getRiwayatTesByUserId($connect, $user_id);
$statistikTes = hitungStatistikTes($riwayatTes);

// Akses datanya seperti ini:
$totalTes = $statistikTes['total_tes'];
$rataRata = $statistikTes['rata_rata'];
$nilaiTertinggi = $statistikTes['tertinggi'];
$tipePalingSering = $statistikTes['tipe_terbanyak'];
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Riwayat Tes Kecerdasan</title>
    <link rel="stylesheet" href="../../src/styles/style.css">
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[poppins] text-gray-800 overflow-x-hidden bg-secondary-400">
    <?php include '../../components/user/navbar.php'; ?>
    <?php include '../../components/mobileNavbar.php'; ?>

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Statistik Tes Kecerdasan</h1>
                <i class="fa-solid fa-clock-rotate-left text-xl text-purple-600"></i>
            </div>

            <!-- Kartu Statistik -->
            <div class="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gradient-to-r from-purple-100 to-pink-100 p-5 rounded-xl shadow-md border border-purple-200">
                    <p class="text-sm text-gray-600">Jumlah Tes</p>
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-purple-800"><?= $totalTes ?></h2>
                        <i class="fa-solid fa-list-check text-2xl text-purple-600"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-100 to-pink-100 p-5 rounded-xl shadow-md border border-purple-200">
                    <p class="text-sm text-gray-600">Rata-rata Nilai</p>
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-purple-800"><?= $rataRata ?></h2>
                        <i class="fa-solid fa-chart-line text-2xl text-purple-600"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-100 to-pink-100 p-5 rounded-xl shadow-md border border-purple-200">
                    <p class="text-sm text-gray-600">Skor Tertinggi</p>
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-purple-800"><?= $nilaiTertinggi ?></h2>
                        <i class="fa-solid fa-trophy text-2xl text-purple-600"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-100 to-pink-100 p-5 rounded-xl shadow-md border border-purple-200">
                    <p class="text-sm text-gray-600">Tipe Paling Sering</p>
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-purple-800"><?= htmlspecialchars($tipePalingSering) ?></h2>
                        <i class="fa-solid fa-brain text-2xl text-purple-600"></i>
                    </div>
                </div>
            </div>

            <!-- Grafik Statistik -->
            <div class="bg-white mt-10 p-6 rounded-xl shadow-md border border-purple-200">
                <h2 class="text-lg font-semibold text-purple-800 mb-4">Perkembangan Nilai Tes</h2>
                <canvas id="chartNilaiCPI" height="120"></canvas>
            </div>


            <footer class="text-center mt-12 text-white/80 text-sm">
                <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
            </footer>
        </div>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$labels = array_column($riwayatTes, 'tanggal_tes');
$dataNilai = array_column($riwayatTes, 'nilai_cpi');

$labels = array_reverse($labels);       // Urutkan dari lama ke baru
$dataNilai = array_reverse($dataNilai); // Urutkan dari lama ke baru
?>

<script>
    const labels = <?= json_encode($labels) ?>;
    const dataNilai = <?= json_encode($dataNilai) ?>;

    const ctx = document.getElementById('chartNilaiCPI').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels.map(t => new Date(t).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short'
            })),
            datasets: [{
                label: 'Nilai CPI',
                data: dataNilai,
                borderColor: 'rgba(168, 85, 247, 1)',
                backgroundColor: 'rgba(233, 213, 255, 0.4)',
                fill: true,
                tension: 0.3,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Skor CPI'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal Tes'
                    }
                }
            }
        }
    });
</script>