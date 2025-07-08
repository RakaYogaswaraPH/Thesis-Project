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


//* Users Config *\\
// Login Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = $_POST["password"];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {
            $user_id = $user['id'];
            $role = $user['role'];

            if ($role === 'pengguna') {
                $detail = mysqli_query($connect, "SELECT * FROM pengguna_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['pengguna'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_anak' => $data['nama_anak'],
                    'role' => $role
                ];

                echo "<script>alert('Login berhasil!'); location.href='pages/pengguna/beranda.php';</script>";
                exit;
            } elseif ($role === 'guru') {
                $detail = mysqli_query($connect, "SELECT * FROM guru_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['guru'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_guru' => $data['nama_guru'],
                    'jabatan' => $data['jabatan'],
                    'role' => $role
                ];

                echo "<script>alert('Login berhasil!'); location.href='pages/guru/home.php';</script>";
                exit;
            } elseif ($role === 'admin') {
                $detail = mysqli_query($connect, "SELECT * FROM admin_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['admin'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_admin' => $data['nama_admin'],
                    'role' => $role
                ];

                echo "<script>alert('Login berhasil!'); location.href='pages/admin/dashboard.php';</script>";
                exit;
            } else {
                echo "<script>alert('Role tidak dikenali!'); history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Password salah!'); history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); history.back();</script>";
        exit;
    }
}

// Register Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $re_password = mysqli_real_escape_string($connect, $_POST['re_password']);
    $nama_anak = mysqli_real_escape_string($connect, $_POST['nama_anak']);
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_orangtua = mysqli_real_escape_string($connect, $_POST['nama_orangtua']);
    $telepon = mysqli_real_escape_string($connect, $_POST['nomor_telepon']);

    if ($password !== $re_password) {
        echo "<script>alert('Password tidak cocok!'); history.back();</script>";
        exit;
    }

    $cek = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah digunakan!'); history.back();</script>";
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO users (email, password, role) VALUES ('$email', '$hash', 'pengguna')");
    $user_id = mysqli_insert_id($connect);

    mysqli_query($connect, "INSERT INTO pengguna_detail (user_id, nama_anak, kelas, jenis_kelamin, nama_orangtua, nomor_telepon)
        VALUES ('$user_id', '$nama_anak', '$kelas', '$jenis_kelamin', '$nama_orangtua', '$telepon')");

    $_SESSION['pengguna'] = [
        'id' => $user_id,
        'nama_anak' => $nama_anak,
        'email' => $email,
        'role' => 'pengguna'
    ];

    echo "<script>alert('Pendaftaran berhasil!'); location.href='pages/pengguna/home.php';</script>";
    exit;
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


// Tangani aksi ubah dan hapus guru
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
