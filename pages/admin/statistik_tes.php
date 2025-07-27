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

// Ambil jumlah pengikut tes per bulan dari hasil_cpi (periode 2025–2026)
$bulanData = [];
for ($year = 2025; $year <= 2026; $year++) {
    for ($month = 1; $month <= 12; $month++) {
        $key = sprintf('%04d-%02d', $year, $month);
        $bulanData[$key] = 0; // default 0
    }
}

$query_bulanan = mysqli_query($connect, "
  SELECT DATE_FORMAT(tanggal_tes, '%Y-%m') as bulan, COUNT(*) as total
  FROM hasil_cpi
  WHERE YEAR(tanggal_tes) BETWEEN 2025 AND 2026
  GROUP BY bulan
");

while ($row = mysqli_fetch_assoc($query_bulanan)) {
    $bulanData[$row['bulan']] = (int)$row['total'];
}

// Ubah ke format JS array
$labels = [];
$data_tes = [];
foreach ($bulanData as $bulan => $total) {
    $labels[] = date('F Y', strtotime($bulan . '-01')); // contoh: January 2025
    $data_tes[] = $total;
}

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
                    <a class="text-white text-2xl uppercase hidden lg:inline-block font-semibold mt-6"> Statistik Tes </a>
                    <!-- Navbar -->
                    <?php include '../../components/admin/Profile.php'; ?>
                    <!-- End Of Navbar -->
                </div>
            </nav>

            <!-- Header -->
            <div class="relative bg-secondary-400 md:pt-20 pb-32 pt-12"></div>

            <!-- BARIS 1 -->
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="flex flex-wrap mb-10">
                    <div class="w-full px-4">
                        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-gray-700">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h6 class="uppercase text-gray-100 mb-1 text-xs font-semibold">
                                            Ringkasan
                                        </h6>
                                        <h2 class="text-white text-xl font-semibold">
                                            Jumlah Pengikut Tes
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 flex-auto">
                                <!-- Chart -->
                                <div class="relative h-[350px]">
                                    <canvas id="line-chart"></canvas>
                                </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="../../src/js/modal.js"></script>
    <script>
        const bulanLabels = <?= json_encode($labels) ?>;
        const dataTesPerBulan = <?= json_encode($data_tes) ?>;
    </script>

    <script type="text/javascript">
        (function() {
            /* Chart initialisations */
            /* Line Chart */
            var config = {
                type: "line",
                data: {
                    labels: bulanLabels,
                    datasets: [{
                        label: "Jumlah Tes CPI",
                        backgroundColor: "#4c51bf",
                        borderColor: "#4c51bf",
                        data: dataTesPerBulan,
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: false,
                        text: "Sales Charts",
                        fontColor: "white"
                    },
                    legend: {
                        labels: {
                            fontColor: "white"
                        },
                        align: "end",
                        position: "bottom"
                    },
                    tooltips: {
                        mode: "index",
                        intersect: false
                    },
                    hover: {
                        mode: "nearest",
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontColor: "rgba(255,255,255,.7)",
                                autoSkip: true,
                                maxTicksLimit: 8
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Month",
                                fontColor: "white"
                            },
                            gridLines: {
                                display: false,
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: "rgba(33, 37, 41, 0.3)",
                                zeroLineColor: "rgba(0, 0, 0, 0)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2]
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontColor: "rgba(255,255,255,.7)",
                                maxRotation: 45,
                                minRotation: 45
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Value",
                                fontColor: "white"
                            },
                            gridLines: {
                                borderDash: [3],
                                borderDashOffset: [3],
                                drawBorder: false,
                                color: "rgba(255, 255, 255, 0.15)",
                                zeroLineColor: "rgba(33, 37, 41, 0)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2]
                            }
                        }]
                    }
                }
            };
            var ctx = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(ctx, config);

            /* Bar Chart */
            config = {
                type: "bar",
                data: {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July"
                    ],
                    datasets: [{
                            label: new Date().getFullYear(),
                            backgroundColor: "#ed64a6",
                            borderColor: "#ed64a6",
                            data: [30, 78, 56, 34, 100, 45, 13],
                            fill: false,
                            barThickness: 8
                        },
                        {
                            label: new Date().getFullYear() - 1,
                            fill: false,
                            backgroundColor: "#4c51bf",
                            borderColor: "#4c51bf",
                            data: [27, 68, 86, 74, 10, 4, 87],
                            barThickness: 8
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: false,
                        text: "Orders Chart"
                    },
                    tooltips: {
                        mode: "index",
                        intersect: false
                    },
                    hover: {
                        mode: "nearest",
                        intersect: true
                    },
                    legend: {
                        labels: {
                            fontColor: "rgba(0,0,0,.4)"
                        },
                        align: "end",
                        position: "bottom"
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            scaleLabel: {
                                display: true,
                                labelString: "Month"
                            },
                            gridLines: {
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: "rgba(33, 37, 41, 0.3)",
                                zeroLineColor: "rgba(33, 37, 41, 0.3)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2]
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontColor: "rgba(255,255,255,.9)",
                                fontSize: 14,
                                fontStyle: "bold",
                                padding: 10,
                                maxTicksLimit: 5,
                                beginAtZero: true
                            },
                            display: true,
                            gridLines: {
                                borderDash: [3],
                                drawBorder: false,
                                color: "rgba(255, 255, 255, 0.15)"
                            }
                        }]
                    }
                }
            };
            ctx = document.getElementById("bar-chart").getContext("2d");
            window.myBar = new Chart(ctx, config);
        })();
    </script>
</body>

</html>