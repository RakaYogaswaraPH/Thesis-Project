<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['guru'])) {
    header("Location: ../../login.php");
    exit;
}

function setFlash($icon, $title, $message, $autoClose = false)
{
    $_SESSION['flash_message'] = [
        'icon' => $icon,
        'title' => $title,
        'message' => $message,
        'autoClose' => $autoClose
    ];
    header("Location: ../pages/guru/pengaturan_akun.php");
    exit;
}

$guru = $_SESSION['guru'];
$user_id = $guru['id'];

$nama_guru = mysqli_real_escape_string($connect, $_POST['nama_guru'] ?? '');
$email = mysqli_real_escape_string($connect, $_POST['email'] ?? '');
$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

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

if (!empty($nama_guru)) {
    mysqli_query($connect, "UPDATE guru_detail SET nama_guru='$nama_guru' WHERE user_id='$user_id'");
    $_SESSION['guru']['nama_guru'] = $nama_guru;
}

if (!empty($email)) {
    mysqli_query($connect, "UPDATE users SET email='$email' WHERE id='$user_id'");
    $_SESSION['guru']['email'] = $email;
}

setFlash('success', 'Berhasil', 'Data akun berhasil diperbarui', true);
