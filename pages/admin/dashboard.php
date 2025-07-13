<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../../login.php");
  exit;
}

$pengguna = $_SESSION['admin'];
$greeting = getGreeting();
$jumlah_pengguna = hitungJumlahPengguna();
$pengguna_baru = hitungPenggunaBaruHariIni();

// Hitung pertumbuhan (%)
$persentase = 0;
if ($jumlah_pengguna > 0 && $pengguna_baru > 0) {
  $jumlah_lama = $jumlah_pengguna - $pengguna_baru;
  $persentase = $jumlah_lama > 0 ? ($pengguna_baru / $jumlah_lama) * 100 : 100;
}
$ikon_tren = $persentase >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
$warna_tren = $persentase >= 0 ? 'text-emerald-500' : 'text-orange-500';

// Ambil semua pengguna yang terdaftar
$query_pengikut = mysqli_query($connect, "SELECT nama_anak, kelas, jenis_kelamin, nama_orangtua FROM pengguna_detail ORDER BY nama_anak ASC");
// Ambil 5 nilai CPI tertinggi dan nama anaknya
$query_ranking = mysqli_query($connect, "
  SELECT pd.nama_anak, hc.nilai_cpi
  FROM (
    SELECT user_id, MAX(tanggal_tes) as tanggal_terbaru
    FROM hasil_cpi
    GROUP BY user_id
  ) latest
  JOIN hasil_cpi hc ON hc.user_id = latest.user_id AND hc.tanggal_tes = latest.tanggal_terbaru
  JOIN pengguna_detail pd ON pd.user_id = hc.user_id
  ORDER BY hc.nilai_cpi DESC
  LIMIT 5
");

// Hitung total tes
$query_total_tes = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi");
$row_total_tes = mysqli_fetch_assoc($query_total_tes);
$jumlah_tes = $row_total_tes['total'];

// Hitung pertumbuhan tes dari hari sebelumnya
$hari_ini = date('Y-m-d');
$kemarin = date('Y-m-d', strtotime('-1 day'));

$query_hari_ini = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi WHERE DATE(tanggal_tes) = '$hari_ini'");
$query_kemarin = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi WHERE DATE(tanggal_tes) = '$kemarin'");
$total_hari_ini = mysqli_fetch_assoc($query_hari_ini)['total'];
$total_kemarin = mysqli_fetch_assoc($query_kemarin)['total'];

$persentase_tes = 0;
$ikon_tes = 'fa-arrow-up';
$warna_tes = 'text-emerald-500';
if ($total_kemarin > 0) {
  $persentase_tes = ($total_hari_ini / $total_kemarin) * 100;
  if ($total_hari_ini < $total_kemarin) {
    $ikon_tes = 'fa-arrow-down';
    $warna_tes = 'text-orange-500';
  }
}

$query_tertinggi = mysqli_query($connect, "
  SELECT pd.nama_anak, pd.kelas, hc.nilai_cpi
  FROM hasil_cpi hc
  JOIN pengguna_detail pd ON pd.user_id = hc.user_id
  ORDER BY hc.nilai_cpi DESC
  LIMIT 1
");
$data_tertinggi = mysqli_fetch_assoc($query_tertinggi);


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
    <?php include '../../components/admin/Navbar.php'; ?>
    <!-- End Of Navbar -->
    <div class="relative md:ml-64 bg-gray-50">
      <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <a class="text-white text-2xl uppercase hidden lg:inline-block font-semibold mt-6"> <?= $greeting ?> <?= htmlspecialchars($pengguna['nama_admin']) ?></a>
          <!-- Navbar -->
          <?php include '../../components/admin/Profile.php'; ?>
          <!-- End Of Navbar -->
        </div>
      </nav>

      <!-- Header -->
      <div class="relative bg-secondary-400 md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
          <div>

            <!-- STATS -->
            <!-- STATS -->
            <div class="flex flex-wrap justify-center gap-y-4">
              <!-- Card 1: Jumlah Pengguna -->
              <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                      <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-gray-400 uppercase font-bold text-xs">Jumlah Pengguna</h5>
                        <span class="font-semibold text-xl text-gray-700"><?= $jumlah_pengguna ?></span>
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-400 mt-4">
                      <span class="<?= $warna_tren ?> mr-2">
                        <i class="fas <?= $ikon_tren ?>"></i>
                        <?= number_format($persentase, 2) ?>%
                      </span>
                      <span class="whitespace-nowrap"> Sejak kemarin </span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card 2: Jumlah Tes CPI -->
              <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                      <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-gray-400 uppercase font-bold text-xs">Jumlah Tes CPI</h5>
                        <span class="font-semibold text-xl text-gray-700"><?= $jumlah_tes ?></span>
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                          <i class="far fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-400 mt-4">
                      <span class="<?= $warna_tes ?> mr-2">
                        <i class="fas <?= $ikon_tes ?>"></i>
                        <?= number_format($persentase_tes, 2) ?>%
                      </span>
                      <span class="whitespace-nowrap"> Sejak kemarin </span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card 3: Nilai Tertinggi -->
              <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                      <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-gray-400 uppercase font-bold text-xs">Nilai Tertinggi</h5>
                        <span class="font-semibold text-xl text-gray-700">
                          <?= htmlspecialchars($data_tertinggi['nama_anak'] ?? '-') ?>
                        </span>
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                          <i class="fas fa-trophy"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-400 mt-4">
                      <span class="text-indigo-500 font-semibold"><?= htmlspecialchars($data_tertinggi['kelas'] ?? '-') ?></span>
                      <span class="ml-2 text-gray-600">Skor: <?= $data_tertinggi['nilai_cpi'] ?? '-' ?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>


      <!-- BARIS 1 -->
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mb-3">
          <!-- Pengikut Tes -->
          <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
              <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                  <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-gray-700">Pengikut Tes</h3>
                  </div>
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a href="daftar_pengguna.php">
                      <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        Lihat Semua
                      </button>
                    </a>
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
                      Lihat Semua
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