<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['guru'])) {
    header("Location: ../../login.php");
    exit;
}

$pengguna = $_SESSION['guru'];
$result = getDataRankingTerbaru($connect);
$jumlahTes = getJumlahTesPerPengguna($connect);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../../src/images/Logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../src/styles/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <title>PPMH | Ranking Kecerdasan</title>
</head>

<body class="font-[poppins] text-gray-700 antialiased">
    <div id="root">
        <!-- Navbar -->
        <?php include '../../components/guru/Navbar.php'; ?>
        <!-- End Of Navbar -->

        <div class="relative md:ml-64 bg-gray-50">
            <nav class="absolute top-0 left-0 w-full z-10 bg-transparent flex items-center p-4">
                <div class="w-full mx-auto flex justify-between items-center md:px-10 px-4">
                    <h1 class="text-white text-2xl font-semibold mt-6">Ranking Tes Kecerdasan</h1>
                    <?php include '../../components/admin/Profile.php'; ?>
                </div>
            </nav>

            <!-- Header -->
            <div class="relative bg-secondary-400 md:pt-20 pb-32 pt-12"></div>

            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="flex flex-wrap mt-4 mb-28">
                    <div class="w-full mb-12 px-4">
                        <div class="relative flex flex-col break-words bg-white rounded shadow-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-700">Ranking Anak Terbaik</h3>
                            </div>
                            <div class="block w-full overflow-x-auto">

                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 px-4 py-6">
                                    <div class="flex gap-2 items-center">
                                        <label for="kelasFilter" class="text-sm font-medium text-gray-700">Filter Kelas:</label>
                                        <select id="kelasFilter" class="border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-secondary-400">
                                            <option value="">Semua</option>
                                            <option value="A1">A1</option>
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="text" id="searchInput" placeholder="Cari nama anak..." class="border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-secondary-400">
                                        <button onclick="downloadPDF()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">
                                            <i class="fas fa-file-pdf mr-2"></i>Export PDF
                                        </button>
                                    </div>
                                </div>

                                <table id="rankingTable" class="min-w-full divide-y divide-gray-200 text-sm text-left">
                                    <thead>
                                        <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                                            <th class="px-6 py-3">Ranking</th>
                                            <th class="px-6 py-3">Nama Anak</th>
                                            <th class="px-6 py-3">Kelas</th>
                                            <th class="px-6 py-3">Jenis Kelamin</th>
                                            <th class="px-6 py-3">Nilai CPI</th>
                                            <th class="px-6 py-3">Jumlah Tes</th> <!-- Baru -->
                                        </tr>
                                    </thead>
                                    <tbody id="rankingBody" class="divide-y divide-gray-200">
                                        <?php if ($result && mysqli_num_rows($result) > 0): ?>
                                            <?php $rank = 1; ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <?php
                                                $userId = $row['user_id'];
                                                $jumlahTesUser = $jumlahTes[$userId] ?? 0;
                                                ?>
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4 font-bold text-blue-600"><?= $rank++ ?></td>
                                                    <td class="px-6 py-4"><?= htmlspecialchars($row['nama_anak']) ?></td>
                                                    <td class="px-6 py-4"><?= htmlspecialchars($row['kelas']) ?></td>
                                                    <td class="px-6 py-4"><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                                                    <td class="px-6 py-4 font-semibold text-green-600"><?= number_format($row['nilai_cpi'], 2) ?></td>
                                                    <td class="px-6 py-4"><?= $jumlahTesUser ?>x</td> <!-- ← Jumlah tes -->
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data hasil tes.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include '../../components/admin/footer.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>
<script src="../../src/js/modal.js"></script>
<script src="../../src/js/pdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>