<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}

$pengguna = $_SESSION['pengguna'];
$user_id = $pengguna['id'];

// Ambil input
$nama_anak = isset($_POST['nama_anak']) ? mysqli_real_escape_string($connect, $_POST['nama_anak']) : null;
$kelas = isset($_POST['kelas']) ? mysqli_real_escape_string($connect, $_POST['kelas']) : null;
$telepon = isset($_POST['nomor_telepon']) ? mysqli_real_escape_string($connect, $_POST['nomor_telepon']) : null;

$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Ambil data user
$user_query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

if (!$user_data) {
    echo "<script>alert('Pengguna tidak ditemukan'); window.location.href = '../pages/pengguna/pengaturan_akun.php';</script>";
    exit;
}

// Proses password jika diperlukan
if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
    if (!password_verify($old_password, $user_data['password'])) {
        echo "<script>alert('Password lama salah'); window.location.href = '../pages/pengguna/pengaturan_akun.php';</script>";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password baru dan konfirmasi tidak cocok'); window.location.href = '../pages/pengguna/pengaturan_akun.php';</script>";
        exit;
    }

    if (strlen($new_password) < 8) {
        echo "<script>alert('Password baru minimal 8 karakter'); window.location.href = '../pages/pengguna/pengaturan_akun.php';</script>";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    mysqli_query($connect, "UPDATE users SET password='$hashed_password' WHERE id='$user_id'");
}

// Update data pengguna_detail
$update_fields = [];
if (!empty($nama_anak)) $update_fields[] = "nama_anak='$nama_anak'";
if (!empty($kelas)) $update_fields[] = "kelas='$kelas'";
if (!empty($telepon)) $update_fields[] = "nomor_telepon='$telepon'";

if (!empty($update_fields)) {
    $update_query = "UPDATE pengguna_detail SET " . implode(', ', $update_fields) . " WHERE user_id='$user_id'";
    mysqli_query($connect, $update_query);

    // Update session
    if (!empty($nama_anak)) $_SESSION['pengguna']['nama_anak'] = $nama_anak;
    if (!empty($kelas)) $_SESSION['pengguna']['kelas'] = $kelas;
    if (!empty($telepon)) $_SESSION['pengguna']['nomor_telepon'] = $telepon;
}

echo "<script>alert('Data berhasil diperbarui'); window.location.href = '../pages/pengguna/pengaturan_akun.php';</script>";
