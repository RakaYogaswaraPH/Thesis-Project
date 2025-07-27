<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../../login.php");
    exit;
}

// Fungsi untuk set flash message
function setFlash($icon, $title, $message)
{
    $_SESSION['flash_message'] = [
        'icon' => $icon,
        'title' => $title,
        'message' => $message
    ];
    header("Location: ../pages/admin/pengaturan_akun.php");
    exit;
}

$admin = $_SESSION['admin'];
$user_id = $admin['id'];

$nama_admin = mysqli_real_escape_string($connect, $_POST['nama_admin']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$user_query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

if (!$user_data) {
    setFlash('error', 'Gagal', 'User tidak ditemukan');
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

if (!empty($nama_admin)) {
    mysqli_query($connect, "UPDATE admin_detail SET nama_admin='$nama_admin' WHERE user_id='$user_id'");
    $_SESSION['admin']['nama_admin'] = $nama_admin;
}

if (!empty($email)) {
    mysqli_query($connect, "UPDATE users SET email='$email' WHERE id='$user_id'");
    $_SESSION['admin']['email'] = $email;
}

setFlash('success', 'Berhasil', 'Data akun berhasil diperbarui');
