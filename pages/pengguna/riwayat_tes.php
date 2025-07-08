<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
$pengguna = getPenggunaById($_SESSION['pengguna']['id']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Riwayat Tes Kecerdasan</title>
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
                            <th class="px-4 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-100">
                        <tr class="hover:bg-purple-50 transition">
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3">08 Juli 2025</td>
                            <td class="px-4 py-3">Logika & Penalaran</td>
                            <td class="px-4 py-3 font-semibold">132</td>
                            <td class="px-4 py-3 text-green-600 font-medium">Selesai</td>
                        </tr>
                        <tr class="hover:bg-purple-50 transition">
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3">03 Juli 2025</td>
                            <td class="px-4 py-3">Verbal & Bahasa</td>
                            <td class="px-4 py-3 font-semibold">128</td>
                            <td class="px-4 py-3 text-green-600 font-medium">Selesai</td>
                        </tr>
                        <tr class="hover:bg-purple-50 transition">
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3">28 Juni 2025</td>
                            <td class="px-4 py-3">Visual & Spasial</td>
                            <td class="px-4 py-3 font-semibold">125</td>
                            <td class="px-4 py-3 text-green-600 font-medium">Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-sm text-gray-500">
                <p>* Data ini merupakan hasil tes simulasi yang dilakukan sebelumnya.</p>
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