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
 * Ambil riwayat tes dari database berdasarkan user_id
 */
function getRiwayatTesByUserId($connect, $userId): array
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

$riwayatTes = getRiwayatTesByUserId($connect, $user_id);
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
                <h1 class="text-2xl font-bold text-gray-800">Riwayat Tes Kecerdasan</h1>
                <i class="fa-solid fa-clock-rotate-left text-xl text-purple-600"></i>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gradient-to-r from-purple-100 to-pink-100 text-left">
                        <tr>
                            <th class="px-4 py-3 font-semibold">No</th>
                            <th class="px-4 py-3 font-semibold">Tanggal Tes</th>
                            <th class="px-4 py-3 font-semibold">Tipe Kecerdasan</th>
                            <th class="px-4 py-3 font-semibold">Skor</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-100">
                        <?php if (empty($riwayatTes)): ?>
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500 italic">Belum ada data tes yang tersedia.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($riwayatTes as $i => $tes): ?>
                                <tr class="hover:bg-purple-50 transition">
                                    <td class="px-4 py-3"><?= $i + 1 ?></td>
                                    <td class="px-4 py-3"><?= date('d M Y, H:i', strtotime($tes['tanggal_tes'])) ?></td>
                                    <td class="px-4 py-3"><?= htmlspecialchars($tes['tipe_kecerdasan']) ?></td>
                                    <td class="px-4 py-3 font-semibold"><?= round($tes['nilai_cpi']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-sm text-gray-500">
                <p>* Data ini merupakan riwayat dari hasil tes CPI yang telah Anda lakukan sebelumnya.</p>
            </div>
        </div>

        <footer class="text-center mt-12 text-white/80 text-sm">
            <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
        </footer>
    </div>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>