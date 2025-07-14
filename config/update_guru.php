<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['guru'])) {
    header("Location: ../../login.php");
    exit;
}

$guru = $_SESSION['guru'];
$user_id = $guru['id'];

$nama_guru = mysqli_real_escape_string($connect, $_POST['nama_guru']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Ambil data user
$user_query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);

if (!$user_data) {
    echo "<script>
        alert('User tidak ditemukan');
        window.location.href = '../pages/guru/pengaturan_akun_guru.php';
    </script>";
    exit;
}

// Validasi & Update Password jika semua password field diisi
if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
    if (!password_verify($old_password, $user_data['password'])) {
        echo "<script>
            alert('Password lama salah');
            window.location.href = '../pages/guru/pengaturan_akun_guru.php';
        </script>";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "<script>
            alert('Password baru dan konfirmasi tidak cocok');
            window.location.href = '../pages/guru/pengaturan_akun_guru.php';
        </script>";
        exit;
    }

    if (strlen($new_password) < 8) {
        echo "<script>
            alert('Password baru minimal 8 karakter');
            window.location.href = '../pages/guru/pengaturan_akun_guru.php';
        </script>";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    mysqli_query($connect, "UPDATE users SET password='$hashed_password' WHERE id='$user_id'");
}

// Update nama guru jika diisi
if (!empty($nama_guru)) {
    mysqli_query($connect, "UPDATE guru_detail SET nama_guru='$nama_guru' WHERE user_id='$user_id'");
    $_SESSION['guru']['nama_guru'] = $nama_guru;
}

// Update email jika diisi
if (!empty($email)) {
    mysqli_query($connect, "UPDATE users SET email='$email' WHERE id='$user_id'");
    $_SESSION['guru']['email'] = $email;
}

echo "<script>
    alert('Data akun berhasil diperbarui');
    window.location.href = '../pages/guru/pengaturan_akun.php';
</script>";
