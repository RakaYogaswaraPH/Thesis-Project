<?php
include './config/config.php';
session_start();
$_SESSION['user_id'] = 19; // contoh ID pengguna yang ada


// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_ppmh");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua soal dan jawaban
$sql = "SELECT s.id as soal_id, s.kriteria, s.pertanyaan, j.id as jawaban_id, j.jawaban, j.nilai_konversi
        FROM soal_cpi s
        JOIN jawaban_cpi j ON s.id = j.soal_id
        ORDER BY s.kriteria, s.id";

$result = $conn->query($sql);

$soal_data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $soal_data[$row['soal_id']]['pertanyaan'] = $row['pertanyaan'];
        $soal_data[$row['soal_id']]['kriteria'] = $row['kriteria'];
        $soal_data[$row['soal_id']]['jawaban'][] = [
            'id' => $row['jawaban_id'],
            'text' => $row['jawaban'],
            'nilai' => $row['nilai_konversi']
        ];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tes Kecerdasan CPI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6 text-center">Tes Kecerdasan Anak (CPI)</h1>
        <form action="proses_tes.php" method="post">
            <?php foreach ($soal_data as $soal_id => $soal): ?>
                <div class="mb-6">
                    <p class="font-semibold mb-2">
                        <?= htmlspecialchars($soal['kriteria']) ?>: <?= htmlspecialchars($soal['pertanyaan']) ?>
                    </p>
                    <?php foreach ($soal['jawaban'] as $j): ?>
                        <label class="block mb-1">
                            <input type="radio" name="jawaban[<?= $soal_id ?>]" value="<?= $j['nilai'] ?>" required>
                            <?= htmlspecialchars($j['text']) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="text-center mt-8">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                    Selesai Tes
                </button>
            </div>
        </form>
    </div>
</body>

</html>