<?php
include '../../config/config.php';
session_start();

if (!isset($_SESSION['guru'])) {
    header("Location: ../../login.php");
    exit;
}

$pengguna = $_SESSION['guru'];
$greeting = getGreeting();

// Tabel & Ranking
$query_pengikut = getPengikutTes($connect);
$query_ranking = getRankingTertinggi($connect);
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
    <title>PPMH | Dashboard</title>
</head>

<body class="font-[poppins] text-gray-700 antialiased">
    <div id="root">
        <!-- Navbar -->
        <?php include '../../components/guru/Navbar.php'; ?>
        <!-- End Of Navbar -->
        <div class="relative md:ml-64 bg-gray-50">
            <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                    <a class="text-white text-2xl uppercase hidden lg:inline-block font-semibold mt-6"> <?= $greeting ?> <?= htmlspecialchars($pengguna['nama_guru']) ?></a>
                    <!-- Navbar -->
                    <?php include '../../components/admin/Profile.php'; ?>
                    <!-- End Of Navbar -->
                </div>
            </nav>

            <!-- Header -->
            <div class="relative bg-secondary-400 md:pt-32 pb-32 pt-12"></div>


            <!-- BARIS 1 -->
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="flex flex-wrap mb-36">
                    <!-- Pengikut Tes -->
                    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-gray-700">Pengikut Tes</h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Nama Pengguna
                                            </th>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Kelas
                                            </th>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Jenis Kelamin
                                            </th>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Nama Orang Tua
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($pengikut = mysqli_fetch_assoc($query_pengikut)) : ?>
                                            <tr>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                    <?= htmlspecialchars($pengikut['nama_anak']) ?>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <?= htmlspecialchars($pengikut['kelas']) ?>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <?= htmlspecialchars($pengikut['jenis_kelamin']) ?>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <?= htmlspecialchars($pengikut['nama_orangtua']) ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Ranking Tes IQ -->
                    <div class="w-full xl:w-4/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-gray-700">Ranking Tes IQ</h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                        <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                            <a href="ranking_tes.php">Lihat Semua</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Ranking
                                            </th>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Nama
                                            </th>
                                            <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Skor
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank = 1;
                                        while ($data = mysqli_fetch_assoc($query_ranking)) :
                                        ?>
                                            <tr>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-2">
                                                    <div class="flex items-center">
                                                        <span class="mr-2 font-bold"><?= $rank ?>.</span>
                                                    </div>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                    <?= htmlspecialchars($data['nama_anak']) ?>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <?= $data['nilai_cpi'] ?>
                                                </td>
                                            </tr>
                                        <?php $rank++;
                                        endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navbar -->
                <?php include '../../components/admin/footer.php'; ?>
                <!-- End Of Navbar -->
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="../../src//js/modal.js"></script>
</body>

</html>