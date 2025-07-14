<?php
$connect = mysqli_connect("localhost", "root", "", "db_ppmh");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

function hitungJumlahPengguna()
{
    global $connect;
    $query = "SELECT COUNT(*) AS total FROM pengguna_detail";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

function hitungPenggunaBaruHariIni()
{
    global $connect;
    $today = date('Y-m-d');
    $query = "SELECT COUNT(*) AS total FROM pengguna_detail WHERE DATE(created_at) = '$today'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}


function getGreeting()
{
    date_default_timezone_set('Asia/Jakarta');
    $hour = date('H');

    if ($hour >= 5 && $hour < 11) {
        return "Selamat Pagi";
    } elseif ($hour >= 11 && $hour < 15) {
        return "Selamat Siang";
    } elseif ($hour >= 15 && $hour < 18) {
        return "Selamat Sore";
    } else {
        return "Selamat Malam";
    }
}

function getPenggunaById($id)
{
    global $connect;
    $query = mysqli_query($connect, "SELECT u.email, p.* FROM users u JOIN pengguna_detail p ON u.id = p.user_id WHERE u.id = '$id'");
    return mysqli_fetch_assoc($query);
}


function tambahGuru($connect, $data)
{
    $email = mysqli_real_escape_string($connect, $data['email']);
    $password = mysqli_real_escape_string($connect, $data['password']);
    $nama = mysqli_real_escape_string($connect, $data['nama_guru']);
    $jabatan = mysqli_real_escape_string($connect, $data['jabatan']);
    $telepon = mysqli_real_escape_string($connect, $data['nomor_telepon']);

    $cek = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        return "Email sudah digunakan!";
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO users (email, password, role) VALUES ('$email', '$hash', 'guru')");
    $user_id = mysqli_insert_id($connect);
    mysqli_query($connect, "INSERT INTO guru_detail (user_id, nama_guru, jabatan, nomor_telepon) VALUES ('$user_id', '$nama', '$jabatan', '$telepon')");

    return true;
}

function editGuru($connect, $data)
{
    $id = mysqli_real_escape_string($connect, $data['user_id']);
    $nama = mysqli_real_escape_string($connect, $data['nama_guru']);
    $jabatan = mysqli_real_escape_string($connect, $data['jabatan']);
    $telepon = mysqli_real_escape_string($connect, $data['nomor_telepon']);

    $query = "UPDATE guru_detail SET nama_guru='$nama', jabatan='$jabatan', nomor_telepon='$telepon' WHERE user_id='$id'";
    return mysqli_query($connect, $query);
}

function hapusGuru($connect, $user_id)
{
    $id = mysqli_real_escape_string($connect, $user_id);
    mysqli_query($connect, "DELETE FROM guru_detail WHERE user_id='$id'");
    mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
    return true;
}

function tambahSiswa($connect, $data)
{
    $email = mysqli_real_escape_string($connect, $data['email']);
    $password = mysqli_real_escape_string($connect, $data['password']);
    $nama = mysqli_real_escape_string($connect, $data['nama_anak']);
    $kelas = mysqli_real_escape_string($connect, $data['kelas']);
    $jk = $data['jenis_kelamin'];
    $ortu = mysqli_real_escape_string($connect, $data['nama_orangtua']);
    $telepon = mysqli_real_escape_string($connect, $data['nomor_telepon']);

    $cek = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        return "Email sudah digunakan!";
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO users (email, password, role) VALUES ('$email', '$hash', 'pengguna')");
    $user_id = mysqli_insert_id($connect);
    mysqli_query($connect, "INSERT INTO pengguna_detail (user_id, nama_anak, kelas, jenis_kelamin, nama_orangtua, nomor_telepon)
                            VALUES ('$user_id', '$nama', '$kelas', '$jk', '$ortu', '$telepon')");
    return true;
}

function editSiswa($connect, $data)
{
    $id = mysqli_real_escape_string($connect, $data['user_id']);
    $nama = mysqli_real_escape_string($connect, $data['nama_anak']);
    $kelas = mysqli_real_escape_string($connect, $data['kelas']);
    $jk = mysqli_real_escape_string($connect, $data['jenis_kelamin']);
    $ortu = mysqli_real_escape_string($connect, $data['nama_orangtua']);
    $telepon = mysqli_real_escape_string($connect, $data['nomor_telepon']);

    $query = "UPDATE pengguna_detail SET nama_anak='$nama', kelas='$kelas', jenis_kelamin='$jk', nama_orangtua='$ortu', nomor_telepon='$telepon' WHERE user_id='$id'";

    if (mysqli_query($connect, $query)) {
        return true;
    } else {
        return mysqli_error($connect);
    }
}


function hapusSiswa($connect, $user_id)
{
    $id = mysqli_real_escape_string($connect, $user_id);
    mysqli_query($connect, "DELETE FROM pengguna_detail WHERE user_id='$id'");
    mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
    return true;
}

function getJumlahPengguna($connect)
{
    $result = mysqli_query($connect, "SELECT COUNT(*) as total FROM pengguna_detail");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

function getPenggunaBaruHariIni($connect)
{
    $hari_ini = date('Y-m-d');
    $result = mysqli_query($connect, "SELECT COUNT(*) as total FROM pengguna_detail WHERE DATE(created_at) = '$hari_ini'");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

function hitungPersentasePengguna($jumlah_total, $jumlah_baru)
{
    if ($jumlah_total <= 0) return 0;
    $jumlah_lama = $jumlah_total - $jumlah_baru;
    return $jumlah_lama > 0 ? ($jumlah_baru / $jumlah_lama) * 100 : 100;
}

function getStatTesCPI($connect)
{
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));

    $result_today = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi WHERE DATE(tanggal_tes) = '$today'");
    $result_yesterday = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi WHERE DATE(tanggal_tes) = '$yesterday'");
    $result_total = mysqli_query($connect, "SELECT COUNT(*) as total FROM hasil_cpi");

    $total_today = mysqli_fetch_assoc($result_today)['total'];
    $total_yesterday = mysqli_fetch_assoc($result_yesterday)['total'];
    $total_all = mysqli_fetch_assoc($result_total)['total'];

    $persentase = 0;
    $ikon = 'fa-arrow-up';
    $warna = 'text-emerald-500';

    if ($total_yesterday > 0) {
        $persentase = ($total_today / $total_yesterday) * 100;
        if ($total_today < $total_yesterday) {
            $ikon = 'fa-arrow-down';
            $warna = 'text-orange-500';
        }
    }

    return [
        'jumlah_tes' => $total_all,
        'persentase' => $persentase,
        'ikon' => $ikon,
        'warna' => $warna
    ];
}

function getPengikutTes($connect)
{
    return mysqli_query($connect, "SELECT nama_anak, kelas, jenis_kelamin, nama_orangtua FROM pengguna_detail ORDER BY nama_anak ASC");
}

function getRankingTertinggi($connect, $limit = 5)
{
    $query = "
    SELECT pd.nama_anak, pd.kelas, pd.jenis_kelamin, hc.nilai_cpi
    FROM hasil_cpi hc
    INNER JOIN (
        SELECT user_id, MAX(tanggal_tes) as latest
        FROM hasil_cpi
        GROUP BY user_id
    ) latest_hc ON hc.user_id = latest_hc.user_id AND hc.tanggal_tes = latest_hc.latest
    INNER JOIN pengguna_detail pd ON pd.user_id = hc.user_id
    ORDER BY hc.nilai_cpi DESC
    LIMIT $limit";
    return mysqli_query($connect, $query);
}

function getNilaiTertinggi($connect)
{
    $query = "
    SELECT pd.nama_anak, pd.kelas, hc.nilai_cpi
    FROM hasil_cpi hc
    INNER JOIN (
    SELECT user_id, MAX(tanggal_tes) AS latest
    FROM hasil_cpi
    GROUP BY user_id
    ) latest_hc ON hc.user_id = latest_hc.user_id AND hc.tanggal_tes = latest_hc.latest
    INNER JOIN pengguna_detail pd ON pd.user_id = hc.user_id
    ORDER BY hc.nilai_cpi DESC
    LIMIT 1 ";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

function getDataRankingTerbaru($connect)
{
    $query = "
        SELECT hc.user_id, pd.nama_anak, pd.kelas, pd.jenis_kelamin, hc.nilai_cpi
        FROM hasil_cpi hc
        INNER JOIN (
            SELECT user_id, MAX(tanggal_tes) as latest
            FROM hasil_cpi
            GROUP BY user_id
        ) latest_hc ON hc.user_id = latest_hc.user_id AND hc.tanggal_tes = latest_hc.latest
        INNER JOIN pengguna_detail pd ON pd.user_id = hc.user_id
        ORDER BY hc.nilai_cpi DESC
    ";

    return mysqli_query($connect, $query);
}


function getJumlahTesPerPengguna($connect)
{
    $query = "
        SELECT user_id, COUNT(*) as jumlah_tes
        FROM hasil_cpi
        GROUP BY user_id
    ";

    $result = mysqli_query($connect, $query);

    $data = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['user_id']] = $row['jumlah_tes'];
        }
    }

    return $data;
}
