<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}

// Fungsi simpan notifikasi ke session
function setFlash($icon, $title, $message)
{
    $_SESSION['flash_message'] = [
        'icon' => $icon,
        'title' => $title,
        'message' => $message
    ];
    header("Location: ../pages/guru/pengaturan_akun.php");
    exit;
}

$pengguna = $_SESSION['pengguna'];
$user_id = $pengguna['id'];

$nama_guru = mysqli_real_escape_string($connect, $_POST['nama_guru'] ?? '');
$jabatan = mysqli_real_escape_string($connect, $_POST['jabatan'] ?? '');
$telepon = mysqli_real_escape_string($connect, $_POST['nomor_telepon'] ?? '');
$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$user_query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

if (!$user_data) {
    setFlash('error', 'Gagal', 'Pengguna tidak ditemukan');
}

if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
    if (!password_verify($old_password, $user_data['password'])) {
        setFlash('error', 'Password Salah', 'Password lama salah');
    }

    if ($new_password !== $confirm_password) {
        setFlash('error', 'Konfirmasi Gagal', 'Password baru dan konfirmasi tidak cocok');
    }

    if (strlen($new_password) < 8) {
        setFlash('warning', 'Password Lemah', 'Password baru minimal 8 karakter');
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    mysqli_query($connect, "UPDATE users SET password='$hashed_password' WHERE id='$user_id'");
}

// Update data guru_detail
$update_fields = [];
if (!empty($nama_guru)) $update_fields[] = "nama_guru='$nama_guru'";
if (!empty($jabatan)) $update_fields[] = "jabatan='$jabatan'";
if (!empty($telepon)) $update_fields[] = "nomor_telepon='$telepon'";

if (!empty($update_fields)) {
    $update_query = "UPDATE guru_detail SET " . implode(', ', $update_fields) . " WHERE user_id='$user_id'";
    mysqli_query($connect, $update_query);

    // Update session juga
    $_SESSION['pengguna']['nama_guru'] = $nama_guru;
    $_SESSION['pengguna']['jabatan'] = $jabatan;
    $_SESSION['pengguna']['nomor_telepon'] = $telepon;
}

setFlash('success', 'Berhasil', 'Data berhasil diperbarui');
